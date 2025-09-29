<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Ticket;
use App\Models\User;
use App\Models\UserSubscription;

class DashboardController extends Controller
{
    public function index()
    {
        $newJobs    = Job::whereDate('created_at', today())->count();
        $customers = User::whereIn('user_type', ['provider', 'client'])->count();
        $tickets    = Ticket::count();
        $revenue    = UserSubscription::sum('price');

        $jobStats = Job::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->take(7)
            ->get();

        $subscriptionStats = UserSubscription::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->take(6)
            ->get();

        $revenueStats = UserSubscription::selectRaw('MONTH(created_at) as month, SUM(price) as total')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get()
            ->map(function($item){
                $item->total = (float) $item->total;
                return $item;
            });

        return view('admin.dashboard', compact(
            'newJobs', 'customers', 'tickets', 'revenue',
            'jobStats', 'subscriptionStats', 'revenueStats'
        ));
    }

    public function userSubscription()
    {
        $subscriptions = UserSubscription::with(['user', 'package'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.subscription.index', compact('subscriptions'));
    }

}