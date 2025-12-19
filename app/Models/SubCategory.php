<?php

namespace App\Models;

use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'is_active',
        'is_deleted',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}
