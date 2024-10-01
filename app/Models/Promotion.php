<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'restro_id', 'coupon_id', 'name', 'image', 'start_date', 'end_date', 'status'
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
        return url('storage/promotion/'. $this->image);
    }
}
