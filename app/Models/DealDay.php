<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealDay extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'restro_id', 'coupon_id', 'image', 'date', 'status'
    ];

    public function Restro()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }

    public function Coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        return url('storage/dealday/'. $this->image);
    }
}
