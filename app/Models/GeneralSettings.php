<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;
    protected $fillable =[
        'home_logo','dashboard_logo'
    ];
    protected $table = 'general_settings';

    public function getHomeLogoAttribute(){
        return asset('uploads/logos').'/'. $this->attributes['home_logo'];
    }
    public function getDashboardLogoAttribute(){
        return asset('uploads/logos').'/'. $this->attributes['dashboard_logo'];
    }
}
