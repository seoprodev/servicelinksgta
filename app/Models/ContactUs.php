<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

    protected $fillable = [
      'name',
      'email',
      'phone_number',
      'message',
      'is_view'
    ];

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }
}