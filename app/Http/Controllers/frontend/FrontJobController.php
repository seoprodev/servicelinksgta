<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\UserSubscription;

class FrontJobController extends Controller
{

    public function index()
    {
        $activeSubscription = null;

        $query = Job::with(['category', 'subCategory'])
            ->where('is_active', 1);

        if (auth()->check()) {
            $user = auth()->user();

            $activeSubscription = UserSubscription::where('user_id', $user->id)
                ->where('is_active', 1)
                ->where('subscription_status', 'active')
                ->where('is_deleted', 0)
                ->latest()
                ->first();
        }

        if (!$activeSubscription) {
            $query->where('created_at', '<=', now()->subHours(6));
        }

        $jobs = $query->latest()->get();

        return view('frontend.service', compact('jobs'));
    }


}