<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = ['email'];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}