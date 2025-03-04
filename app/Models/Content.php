<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
       'book_id','chapter_id','content'
    ];
    protected $table = 'content';


    public function chapter(){
        return $this->hasOne(BookChapter::class, 'id','chapter_id');
    }
    public function book(){
        return $this->hasOne(Book::class, 'id','book_id');
    }


}
