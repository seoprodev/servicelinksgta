<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_package_id',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'stripe_payment_method',
        'start_date',
        'end_date',
        'renewed_at',
        'cancelled_at',
        'payment_status',
        'subscription_status',
        'price',
        'remaining_connects',
        'currency',
        'is_active',
        'is_deleted',
    ];

    protected $casts = [
        'start_date'   => 'date',
        'end_date'     => 'date',
        'renewed_at'   => 'date',
        'cancelled_at' => 'date',
        'price'        => 'decimal:2',
        'is_active'    => 'boolean',
        'is_deleted'   => 'boolean',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class, 'subscription_package_id');
    }

}