<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        "business_id",
        "business_key",
        "item_title",
        "image",
        "start_time",
        "total_time",
        "status",
    ];

    public function users_list()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getImageAttribute()
    {
        return asset('uploads/order') . '/' . $this->attributes['image'];
    }

    public function business_list()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }
}
