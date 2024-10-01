<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'logo', 'ref_code', 'price_per_person', 'mobile', 'mobile2',
        'country_id', 'state_id', 'city_id', 'address', 'zip_code', 'meal_preference', 'latitude', 'longitude',
        'status','admin_status','details_status', 'top_restro','passport_price','terms','validity', 'must_try',
        'establishment_type', 'open_time', 'affiliate_id', 'rank','gr_coin','expire_date', 'subscription_status',
        'gift_send', 'event_details', 'compliment_coin', 'staff_allocation',
    ];

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        return url('storage/logo/'. $this->logo);
    }

    public function Country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function Restro()
    {
        return $this->belongsTo(Restro::class, 'id', 'restro_id');
    }

    public function State()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function City()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function RestroCategory()
    {
        return $this->hasMany(RestroCategory::class, 'restro_id', 'id');
    }

    public function RestroFacility()
    {
        return $this->hasMany(RestroFacility::class, 'restro_id', 'id');
    }

    public function RestroImage()
    {
        return $this->hasMany(RestroImage::class, 'restro_id', 'id');
    }
    public function Coupon()
    {
        return $this->hasMany(Coupon::class, 'restro_id', 'id');
    }

    public function Customer()
    {
        return $this->hasMany(Passport::class, 'restro_id', 'id');
    }

    protected $casts = [
        'open_time' => 'json',
    ];
}
