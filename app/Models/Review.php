<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'client_id',
        'provider_id',
        'rating',
        'title',
        'message',
        'is_active',
        'attachments'
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}