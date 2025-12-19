<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'billing_cycle',
        'connects',
        'features',
        'is_featured',
        'is_active',
        'is_deleted',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'is_deleted' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}