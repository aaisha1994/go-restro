<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'user_id', 'admin_id', 'affiliate_id', 'notification_id', 'status', 'title', 'message','image'
    ];
}
