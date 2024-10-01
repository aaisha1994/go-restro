<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCoupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gift_id', 'coupon_id', 'quantity', 'status'
    ];

    public function Coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }

    public function Gift()
    {
        return $this->hasOne(Gift::class, 'id', 'gift_id');
    }
}
