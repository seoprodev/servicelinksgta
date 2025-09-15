<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'first_name',
    'last_name',
    'avatar',
    'bio',
    'phone',
    'address',
    'gender',
    'dob',
    'country',
    'city',
    'state',
    'postal_code',
    'company_name',
    'business_license',
    'government_doc',
    'accept_terms',
    'verification_code',
    'is_verified',
];

    public function user()
    {
        return $this->belongsTo(User::class);  // One user can have one profile
    }
}
