<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
       'image','url'
    ];
    protected $table = 'app_slider';
    public function getImageAttribute(){
        return asset('uploads/slider').'/'. $this->attributes['image'];
    }
}
