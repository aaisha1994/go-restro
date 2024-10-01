<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mobile', 'restro_id', 'admin_id', 'affiliate_id', 'user_id', 'start_date', 'end_date', 'status', 'gift_type','utm_id'
    ];

    public function GiftCoupon()
    {
        return $this->hasMany(GiftCoupon::class, 'gift_id', 'id');
    }

    public function Restro()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
}
