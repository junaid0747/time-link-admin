<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Stripe\Order;

class Users extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name', 'email', 'phone', 'image', 'password', 'id', 'user_name', 'age', 'city', 'gender', 'device_token', 'device_id', 'last_seen', 'date_of_birth',
    ];
    protected $table = 'users';
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute()
    {
        return asset('uploads/user') . '/' . $this->attributes['image'];
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id', 'id');
    }

    public function getLastLoginAtAttribute($value)
    {
        return $this->attributes['last_login_at'] ? $this->attributes['last_seen']->format('Y-m-d H:i:s') : null;
    }
}
