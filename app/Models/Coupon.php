<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['restro_id','name','details','quantity','validity','image','terms','status','redeemed'];

    public function Restro()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        return url('storage/coupon/'. $this->image);
    }
}
