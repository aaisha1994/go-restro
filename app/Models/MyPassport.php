<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyPassport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','restro_id', 'status', 'expire_date'
    ];
}
