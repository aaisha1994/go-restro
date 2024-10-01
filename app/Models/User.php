<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name','email ','password','mobile','otp','image','date_of_birth','ref_code','ref_by','affiliate_id',
        'status', 'other_date', 'expire_date', 'subscription_status', 'wallet', 'source'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'other_date' => 'json',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    protected $appends = [
        "image_path",
        'current_restro'
        // 'purchase_date',
        // 'expired_date',
    ];

    public function getImagePathAttribute()
    {
        return url('storage/user/'. $this->image);
    }
    public function getCurrentRestroAttribute()
    {
        $Transaction = Transaction::where('user_id', $this->id)->where('status',1)->where('start_date','<=', date('Y-m-d'))->where('end_date','>=', date('Y-m-d'))->count();
        return $Transaction;
    }
    // public function getPurchaseDateAttribute()
    // {
    //     return 'N/A';
    // }
    // public function getExpiredDateAttribute()
    // {
    //     return 'N/A';
    // }

    public function Country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function State()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function City()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
