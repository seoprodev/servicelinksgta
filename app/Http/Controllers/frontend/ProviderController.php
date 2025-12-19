<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\ProviderLead;
use App\Models\Review;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class ProviderController extends Controller
{
    public function DashboardIndex()
    {
        $provider = auth()->user();

        // Leads
        $leadsCount = ProviderLead::where('provider_id', $provider->id)
            ->whereHas('job')
            ->count();

        $todayLeads = ProviderLead::where('provider_id', $provider->id)
            ->whereDate('created_at', today())
            ->count();

        // Subscription
        $subscription = UserSubscription::where('user_id', $provider->id)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest('start_date')
            ->with('package')
            ->first();

        if ($subscription) {
            $planName   = $subscription->package->name ?? 'No Plan';
            $validTill  = optional($subscription->end_date)->format('d M Y') ?? 'N/A';
            $price      = $subscription->price ?? 0;
            $currency   = $subscription->currency ?? '$';
            $status     = $subscription->subscription_status ?? 'inactive';
            $remainingConnects = $subscription->remaining_connects ?? 0;
        } else {
            $planName   = 'No Active Plan';
            $validTill  = 'N/A';
            $price      = 0;
            $currency   = '$';
            $status     = 'inactive';
            $remainingConnects = 0;
        }

        // Tickets
        $ticketsCount = Ticket::where('user_id', $provider->id)->count();
        $pendingTickets = Ticket::where('user_id', $provider->id)
            ->where('status', 'pending')
            ->count();

        // Reviews
        $reviewsCount = Review::where('provider_id', $provider->id)->count();
        $averageRating = number_format(
            Review::where('provider_id', $provider->id)->avg('rating') ?? 0,
            1
        );

        // Chart Data (leads per month)
        $monthlyLeads = ProviderLead::where('provider_id', $provider->id)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $chartData = [];
        foreach (range(1, 12) as $m) {
            $chartData[] = $monthlyLeads[$m] ?? 0;
        }

        return view('frontend.provider.dashboard', compact(
            'leadsCount', 'todayLeads',
            'planName', 'validTill', 'price', 'currency', 'status', 'remainingConnects',
            'ticketsCount', 'pendingTickets',
            'reviewsCount', 'averageRating',
            'months', 'chartData'
        ));
    }




    public function leadIndex()
    {
        $user = auth()->user();

        $activeSubscription = UserSubscription::where('user_id', $user->id)
            ->where('is_active', 1)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest()
            ->first();

        $query = Job::where('is_active', 1)
            ->with(['category', 'subCategory', 'leads'])->whereNotIn('status', ['completed', 'cancelled']);

        if (!$activeSubscription) {
            $query->where('created_at', '<=', now()->subHours(6));
        }

        $jobs = $query->latest()->get();

        return view('frontend.provider.jobs.leads', compact('jobs', 'activeSubscription'));
    }


    public function leadShow($id)
    {
        $user = auth()->user();

        $activeSubscription = UserSubscription::where('user_id', $user->id)
            ->where('is_active', 1)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest()
            ->first();

        $job = Job::with(['category', 'subCategory'])->findOrFail(FakerURL::id_d($id));
        return view('frontend.provider.jobs.lead-show', compact('job', 'activeSubscription'));
    }

    public function buyLead(Request $request)
    {
        $provider = Auth::user();
        $jobId = $request->job_id;

        $job = Job::findOrFail(FakerURL::id_d($jobId));

        $existingLead = ProviderLead::where('provider_id', $provider->id)
            ->where('job_id', $job->id)
            ->first();

        if ($existingLead) {
            return response()->json([
                'error' => true,
                'message' => 'You have already purchased this lead!',
            ], 400);
        }


        $activeSubscription = UserSubscription::where('user_id', $provider->id)
            ->where('is_active', 1)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest()
            ->first();

        if ($activeSubscription) {
            if ($activeSubscription->remaining_connects < 1) {
                return response()->json([
                    'error' => 'You have no remaining connects in your subscription.'
                ], 400);
            }

            $activeSubscription->decrement('remaining_connects');

            ProviderLead::create([
                'provider_id' => $provider->id,
                'client_id' => $job->user_id,
                'job_id' => $job->id,
                'purchase_type' => 'subscription',
                'purchase_at' => now(),
                'purchase_price' => 0,
                'job_status' => 'bought',
            ]);

            $client = $job->user;
            $client->providers()->syncWithoutDetaching([$provider->id]);
        } else {

            return response()->json([
                'error' => true,
                'message' => 'You Dont Have Subscription!',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lead purchased successfully!',
        ]);
    }

    public function providerLeadIndex()
    {
        $provider = auth()->user();

        $leads = ProviderLead::where('provider_id', $provider->id)
            ->whereHas('job')
            ->with(['job', 'job.user'])
            ->latest()
            ->get();

        return view('frontend.provider.jobs.my-leads', compact('leads'));
    }

    public function providerLeadShow($id)
    {
        $lead = ProviderLead::with(['job', 'job.user'])->findOrFail(FakerURL::id_d($id));

        return view('frontend.provider.jobs.my-lead-show', compact('lead'));

    }


    public function checkout(Request $request)
    {
        $provider = Auth::user();
        $jobId = $request->job_id;
        $job = Job::findOrFail($jobId);

        $alreadyBought = ProviderLead::where('provider_id', $provider->id)
            ->where('job_id', $job->id)
            ->first();

        if ($alreadyBought) {
            return response()->json([
                'error' => true,
                'message' => 'You already purchased this lead.'
            ], 400);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $job->category->lead_price ?? 0;

        if ($amount <= 0) {
            return response()->json([
                'error' => true,
                'message' => 'Invalid lead price.'
            ], 400);
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $job->title,
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('provider.pay-lead.success') . '?job_id=' . $job->faker_id . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('provider.pay-lead.cancel'),
        ]);

        return response()->json(['session_id' => $session->id]);
    }

    public function success(Request $request)
    {
        $provider = Auth::user();
        $jobId = FakerURL::id_d($request->query('job_id'));
        $sessionId = $request->query('session_id');

        $job = Job::findOrFail($jobId);

        $alreadyBought = ProviderLead::where('provider_id', $provider->id)
            ->where('job_id', $job->id)
            ->first();

        if ($alreadyBought) {
            return redirect()->route('provider.leads')->with('info', 'Lead already purchased.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::retrieve($sessionId);

        ProviderLead::create([
            'provider_id' => $provider->id,
            'job_id' => $job->id,
            'client_id' => $job->user_id,
            'purchase_type' => 'pay_per_lead',
            'purchase_at' => now(),
            'purchase_price' => $job->category->lead_price ?? 0,
            'payment_id' => $session->id,
            'stripe_checkout_session_id' => $session->id,
            'stripe_payment_intent_id' => $session->payment_intent,
            'stripe_payment_method' => $session->payment_method_types[0] ?? null,
            'payment_status' => $session->payment_status ?? null,
            'job_status' => 'bought',
        ]);

        $client = $job->user;
        $client->providers()->syncWithoutDetaching([$provider->id]);


        return redirect()->route('provider.leads')->with('success', 'Lead purchased successfully!');
    }

    public function cancel()
    {
        return redirect()->route('provider.leads')->with('error', 'Payment was cancelled.');
    }

    public function ProviderProfileShow()
    {
        $user = Auth::user();
        return view('frontend.provider.profile', compact('user'));
    }

    public function ProviderUpdateProfile(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'gender'       => 'required|in:male,female',
            'dob'          => 'required|date',
            'address'      => 'required|string|max:255',
            'country'      => 'required|string|max:100',
            'state'        => 'required|string|max:100',
            'city'         => 'required|string|max:100',
            'postal_code'  => 'required|string|max:20',
            'company_name'  => 'required|string|max:100',
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($request->id);

            $user->update([
                'name'  => $request->name,
                'email' => $user->email, // readonly
            ]);

            $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

            $profile->first_name  = $request->first_name;
            $profile->last_name   = $request->last_name;
            $profile->phone       = $request->phone;
            $profile->gender      = $request->gender;
            $profile->dob         = $request->dob;
            $profile->bio         = $request->bio;
            $profile->address     = $request->address;
            $profile->country     = $request->country;
            $profile->state       = $request->state;
            $profile->city        = $request->city;
            $profile->postal_code = $request->postal_code;
            $profile->company_name = $request->company_name;

            if ($request->hasFile('avatar')) {
                $avatarName = time() . '_' . uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move(public_path('uploads/user/profile/'), $avatarName);
                $profile->avatar = 'uploads/user/profile/' . $avatarName;
            }

            if ($request->hasFile('business_license_file')) {
                $blName = time() . '_' . uniqid() . '.' . $request->file('business_license_file')->getClientOriginalExtension();
                $request->file('business_license_file')->move(public_path('uploads/user/doc/'), $blName);
                $profile->business_license = 'uploads/user/doc/' . $blName;
            }

            if ($request->hasFile('government_doc')) {
                $idName = time() . '_' . uniqid() . '.' . $request->file('government_doc')->getClientOriginalExtension();
                $request->file('government_doc')->move(public_path('uploads/user/doc/'), $idName);
                $profile->government_doc = 'uploads/user/doc/' . $idName;
            }

            $profile->save();

            DB::commit();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function reviewIndex()
    {
        $provider = Auth::user();
        $reviews = Review::with('client')
            ->where('provider_id', $provider->id)
            ->latest()
            ->get();

        $averageRating = $reviews->avg('rating');
        $totalReviews = $reviews->count();

        return view('frontend.provider.reviews.index', compact('reviews', 'averageRating', 'totalReviews'));
    }

    public function ProviderResetPasswordShow()
    {
        $user = Auth::user();
        return view('frontend.provider.reset-password', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }




}