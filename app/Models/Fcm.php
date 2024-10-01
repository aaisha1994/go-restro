<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'restro_id', 'affiliate_id', 'admin_id', 'type','fcm_token'
    ];
}
