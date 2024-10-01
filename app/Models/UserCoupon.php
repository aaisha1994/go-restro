<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCoupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'coupon_id', 'gift_id', 'passport_id', 'quantity', 'pending', 'status','start_date','end_date','user_id'
    ];

    public function Coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }
}
