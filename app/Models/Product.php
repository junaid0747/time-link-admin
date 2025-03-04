<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getImageAttribute()
    {
        return asset('uploads/products') . '/' . $this->attributes['image'];
    }

    public function business_list()
    {
        return $this->hasOne(Business::class, 'id', 'business_id');
    }
}
