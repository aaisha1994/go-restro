<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'category', 'image', 'message', 'status',
    ];

    public static $Category = [
        '1' => 'Prime Users',
        '2' => 'Non Prime Users',
        '3' => 'Passport Purchased',
        '4' => 'Not Passport Purchased',
        '5' => 'Not Redeemed',
        '6' => 'Events (Same Day)',
        '7' => 'Events (1 Day Advance)',
    ];
}
