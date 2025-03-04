<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'posted_by','created_by','job_title','business_name','job_description','salary_type','minimum_salary'
        ,'maximum_salary','receive_application_by_email','work_location'
    ];
    protected $hidden = [
              'created_by'
    ];
    protected $table = 'vacancy';

    // public function getWorkLocationAttribute(){
    //     return json_decode($this->attributes['work_location'],true);
    // }

    

}
