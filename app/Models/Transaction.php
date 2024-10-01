<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'restro_id', 'subscription_id', 'transaction_id', 'order_no', 'amount', 'tr_type', 'status',
        'ref_amount','ref_code','gift_status','start_date', 'end_date','gr_coin','total_amount','restro_subcription_id'
    ];

    public function Subscription()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id');
    }
    public function Restro()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
    public function RestroSubscription()
    {
        return $this->hasOne(RestroSubcription::class, 'id', 'restro_subcription_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
