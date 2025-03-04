<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_name','business_slogen','business_phone','business_category','business_description','business_price','business_price_ranage'
        ,'business_price_description','business_location','social_media_links'
        ,'website_url','business_logo','business_cover','payment_plan','user_id','device_token','device_id'
    ];
    protected $hidden = [
              'user_id'
    ];
    protected $table = 'business';

    public function getSocialMediaLinksAttribute(){
        return json_decode($this->attributes['social_media_links'],true);
    }
    public function getBusinessLocationAttribute(){
        return json_decode($this->attributes['business_location'],true);
    }

    public function getBusinessLogoAttribute(){
        return asset('uploads/business').'/'. $this->attributes['business_logo'];
    }
    public function getBusinessCoverAttribute(){
        return asset('uploads/business').'/'. $this->attributes['business_cover'];
    }
    public function getBusinessIdentityFrontAttribute(){
        return asset('uploads/business').'/'. $this->attributes['business_identity_front'];
    }
    public function getBusinessIdentityBackAttribute(){
        return asset('uploads/business').'/'. $this->attributes['business_identity_back'];
    }
    public function category(){
        return $this->hasOne(Category::class, 'id','business_category');
    }
      public function images(){
        return $this->hasMany(Image::class, 'business_id','id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'business_id','id');
    }
    public function user_list(){
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
    public function orders(){
        return $this->hasMany(Orders::class, 'reference_id', 'id');
    }
}
