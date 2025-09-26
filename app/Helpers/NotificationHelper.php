<?php

namespace App\Helpers;

use App\Events\NotificationCreated;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationHelper
{
    protected static function generateTitle($type)
    {
        $titles = [
            'job_posted'   => 'New Job Posted',
            'contact_message'   => 'New Query',
            'job_assigned' => 'Job Assigned',
            'lead_purchased' => 'Lead Purchased',
            'payment_received' => 'Payment Received',
        ];

        return $titles[$type] ?? ucfirst(str_replace('_', ' ', $type));
    }

    /**
     * Create a new notification
     *
     * @param int $userId
     * @param string $type
     * @param string $message
     * @param string|null $url
     * @param string|null $title (optional, auto generated if not provided)
     * @return Notification|null
     */

    public static function create($userId, $type, $message, $url = null, $title = null)
    {
        try {
            $finalTitle = $title ?? self::generateTitle($type);

            $notification = Notification::create([
                'user_id' => $userId,
                'type'    => $type,
                'title'   => $finalTitle,
                'message' => $message,
                'url'     => $url,
                'is_read' => false,
            ]);

            broadcast(new NotificationCreated($notification))->toOthers();
            return $notification;

        } catch (\Exception $e) {
            Log::error("Notification create failed: " . $e->getMessage());
            return null;
        }
    }
    
    public static function all($userId = null)
    {
        $userId = $userId ?? Auth::id();
        return Notification::where('user_id', $userId)->latest()->get();
    }

    public static function unread($userId = null)
    {
        $userId = $userId ?? Auth::id();
        return Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->latest()
            ->get();
    }

    public static function markAsRead($notificationId)
    {
        $notification = Notification::find($notificationId);
        if ($notification) {
            return $notification->update(['is_read' => true]);
        }
        return false;
    }

    public static function markAllAsRead($userId = null)
    {
        $userId = $userId ?? Auth::id();
        return Notification::where('user_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);
    }

    public static function delete($notificationId)
    {
        $notification = Notification::find($notificationId);
        if ($notification) {
            return $notification->delete();
        }
        return false;
    }
}
