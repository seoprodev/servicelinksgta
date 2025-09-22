<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
      'user_id',
      'subject',
      'priority',
      'message',
      'attachments',
      'status'
    ];


    protected $casts = [
        'attachments' => 'array',
    ];


    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}