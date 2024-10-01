<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redeem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_coupon_id','restro_id','quantity','status'
    ];
}
