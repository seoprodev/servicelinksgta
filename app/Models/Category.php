<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'lead_price',
        'is_deleted',
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}
