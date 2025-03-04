<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function getImageAttribute(){
        return asset('uploads/services').'/'. $this->attributes['image'];
    }
}
