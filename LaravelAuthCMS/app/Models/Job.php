<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function getImageAttribute(){
        return asset('uploads/jobs').'/'. $this->attributes['image'];
    }
}
