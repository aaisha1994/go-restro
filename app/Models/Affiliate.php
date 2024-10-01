<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Affiliate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'mobile', 'ref_code', 'affiliate_type', 'country_id',
        'state_id', 'city', 'address', 'zip_code', 'bank_name', 'holder_name', 'account_number', 'ifsc_code',
        'status', 'vehicle_number', 'agency_name', 'commission_type', 'commission', 'gst_no', 'restro_id',
        'wallet', 'amount'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function State()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}
