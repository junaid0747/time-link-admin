<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';


    public function getImageAttribute(){
        return asset('uploads/events').'/'. $this->attributes['image'];
    }
}
