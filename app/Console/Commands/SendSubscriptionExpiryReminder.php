<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserSubscription;
use App\Helpers\NotificationHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SendSubscriptionExpiryReminder extends Command
{
    protected $signature = 'subscriptions:send-reminders';
    protected $description = 'Send in-app notifications to users whose subscriptions are expiring within 7 days';

    public function handle()
    {
        $today = Carbon::now();
        $targetDate = $today->copy()->addDays(7);

        $expiringSubscriptions = UserSubscription::whereDate('end_date', $targetDate)
            ->where('subscription_status', 'active')
            ->with('user', 'package')
            ->get();

        if ($expiringSubscriptions->isEmpty()) {
            $this->info('No subscriptions expiring within 7 days.');
            return;
        }

        foreach ($expiringSubscriptions as $subscription) {
            $user = $subscription->user;
            if (!$user) continue;

            $planName = $subscription->package->name ?? 'your plan';
            $expiryDate = $subscription->end_date->format('F j, Y');

            $message = "Your subscription for {$planName} will expire on {$expiryDate}.";
            NotificationHelper::create(
                $user->id,
                'subscription_expiry',
                $message,
                route('provider.packages'),
                'Subscription Expiry Reminder'
            );

            $adminMessage = "User {$user->name} ({$user->email})'s subscription for {$planName} will expire on {$expiryDate}.";
            NotificationHelper::create(
                1, // Admin user ID
                'subscription_expiry_alert',
                $adminMessage,
                route('admin.subscription.index'),
                'User Subscription Expiry Alert'
            );

            Log::info("Subscription expiry notification sent to user ID: {$user->id} and admin ID: 1");
        }


        $this->info('All notifications for expiring subscriptions have been sent.');
    }
}
