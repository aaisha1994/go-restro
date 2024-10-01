<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestroSubcription extends Model
{
    use HasFactory,  SoftDeletes;
    protected $fillable = [
        'name', 'amount', 'benefits','gift_send', 'event_details', 'compliment_coin', 'staff_allocation', 'gr_coin', 'status'
    ];
}
