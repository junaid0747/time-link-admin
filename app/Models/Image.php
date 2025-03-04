<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
   
   
    public function getImageAttribute(){
        return asset('uploads/business').'/'. $this->attributes['image'];
    }
}
