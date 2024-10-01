<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitePeople extends Model
{
    use HasFactory;
    protected $fillable = [
        'affiliate_id','email', 'status'
    ];
}
