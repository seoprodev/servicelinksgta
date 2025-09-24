<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'is_active',
    ];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

}