<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','image'
    ];
    protected $table = 'languages';
    public function getImageAttribute(){
        return asset('uploads/language').'/'. $this->attributes['image'];
    }
}
