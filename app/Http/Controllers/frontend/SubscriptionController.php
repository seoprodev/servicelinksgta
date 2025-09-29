<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\SubscriptionPackage;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    public function packageIndex()
    {
        $userId = auth()->id();

        $packages = SubscriptionPackage::where('is_deleted', 0)->get();

        $activeSubscription = UserSubscription::where('user_id', $userId)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest()
            ->first();

        return view('frontend.provider.packages', compact('packages', 'activeSubscription'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'package_id' => 'required|integer|exists:subscription_packages,id',
        ]);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $packageId = $request->package_id;
            $package = SubscriptionPackage::findOrFail($packageId);

            $amount = $package->price;
            $name = $package->name;

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $name,
                        ],
                        'unit_amount' => $amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('subscriptions.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscriptions.cancel'),
                'metadata' => [
                    'package_id' => $packageId,
                ],
            ]);

            return response()->json(['id' => $session->id]);

        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json(['error' => 'Stripe API Error: ' . $e->getMessage()], 500);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Package not found!'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::retrieve($request->get('session_id'));

        $packageId = $session->metadata->package_id ?? null;
        if (!$packageId) {
            return redirect()->route('provider.packages')->with('error', 'Package information not found!');
        }

        $package = SubscriptionPackage::findOrFail($packageId);

        if ($package->billing_cycle === 'monthly') {
            $endDate = now()->addMonth();
        } elseif ($package->billing_cycle === 'quarterly') {
            $endDate = now()->addMonths(3);
        } else {
            $endDate = now()->addYear();
        }

        UserSubscription::where('user_id', auth()->id())
            ->where('is_active', 1)
            ->update([
                'subscription_status' => 'expired',
                'is_active' => 0,
                'end_date' => now(),
            ]);

        UserSubscription::create([
            'user_id' => auth()->id(),
            'subscription_package_id' => $package->id,
            'stripe_checkout_session_id' => $session->id,
            'stripe_payment_intent_id' => $session->payment_intent,
            'stripe_payment_method' => 'subscription',
            'payment_status' => 'paid',
            'remaining_connects' => $package->connects,
            'subscription_status' => 'active',
            'start_date' => now(),
            'end_date' => $endDate,
            'price' => $session->amount_total / 100,
            'currency' => $session->currency,
            'is_active' => 1,
        ]);

        return redirect()->route('provider.packages')->with('success', 'Subscription activated!');
    }


    public function cancel(Request $request)
    {
        $user = Auth::user();

        $subscription = UserSubscription::where('user_id', $user->id)
            ->where('is_active', true)
            ->latest()
            ->first();

        if (!$subscription) {
            return redirect()->back()->with('error', 'No active subscription found.');
        }
        $subscription->update([
            'is_active' => false,
            'subscription_status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Your subscription has been cancelled successfully.');
    }
}