<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
       'image','name','description'
    ];
    protected $table = 'books';


public function chapters(){
    return $this->hasMany(BookChapter::class, 'book_id','id');
}
public function language(){
    return $this->hasOne(Language::class, 'id','language_id');
}
public function category(){
    return $this->hasOne(Category::class, 'id','category_id');
}

public function getImageAttribute(){
    return asset('uploads/book').'/'. $this->attributes['image'];
}


}
