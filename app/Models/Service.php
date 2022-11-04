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
        'IsAvailable',
        'IsDeleted',
    ];

    public function files()
    {
        return $this->hasMany(ServiceAttachment::class);
    }
}
