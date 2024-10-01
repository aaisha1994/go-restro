<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'affiliate_id', 'ref_id', 'amount', 'type', 'status','restro_id','coin'
    ];

    public function Affiliate()
    {
        return $this->hasOne(Affiliate::class, 'id', 'affiliate_id');
    }
    public function Restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
}
