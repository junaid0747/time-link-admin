<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable =[
        'name','email','phone','address','image','password','id'
    ];
    protected $table = 'users';
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute(){
        return asset('uploads/user').'/'. $this->attributes['image'];
    }
}
