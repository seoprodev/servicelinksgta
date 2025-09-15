<?php


namespace App\Http\Controllers\frontend;


use App\Models\Job;
use App\Models\UserSubscription;

class FrontJobController
{

    public function index()
    {

        $user = auth()->user();

        // Check for active subscription
        $activeSubscription = UserSubscription::where('user_id', $user->id)
            ->where('is_active', 1)
            ->where('subscription_status', 'active')
            ->where('is_deleted', 0)
            ->latest()
            ->first();

        $query = Job::where('is_active', 1)
            ->with(['category', 'subCategory']);

        if (!$activeSubscription) {
            // Non-subscriber → sirf old/limited jobs
            $query->where('created_at', '<=', now()->subHours(6));
        }

        $jobs = $query->latest()->get();

        return view('frontend.service', compact('jobs'));

    }


}