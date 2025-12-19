<?php


namespace App\Models;


use App\Helpers\FakerURL;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'sub_category_id',
        'property_type',
        'priority',
        'job_files',
        'budget',
        'description',
        'postal_code',
        'city',
        'country',
        'status',
        'is_active',
        'is_deleted'
    ];


    protected $casts = [
        'job_files' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Job belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Job belongs to SubCategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function getFakerIdAttribute()
    {
        return FakerURL::id_e($this->id);
    }

    public function leads()
    {
        return $this->hasMany(ProviderLead::class, 'job_id');
    }
}