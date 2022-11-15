<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'price',
        'description',
        'category',
        'IsAvailable',
        'IsDeleted',
    ];

    public function files()
    {
        return $this->hasMany(ServiceAttachment::class);
    }

    public function RelatedCategory()
    {
        return $this->hasOne(Category::class,'id','category');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
