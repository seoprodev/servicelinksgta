<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class ProviderLead extends Model
{
    protected $fillable = [
        'provider_id',
        'job_id',
        'client_id',
        'purchase_type',
        'purchase_at',
        'purchase_price',
        'stripe_payment_intent_id',
        'stripe_checkout_session_id',
        'stripe_payment_method',
        'payment_status',
        'lead_status',
        'is_active',
        'is_deleted',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}