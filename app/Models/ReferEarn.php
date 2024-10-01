<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferEarn extends Model
{
    use HasFactory;

    protected $fillable = [
        'coin_per_ref', 'value_of_coin', 'terms', 'status'
    ];
}
