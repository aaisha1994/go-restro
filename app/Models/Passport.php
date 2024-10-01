<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'user_id', 'start_date', 'end_date', 'status', 'gift_status'
    ];

    public function Restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
