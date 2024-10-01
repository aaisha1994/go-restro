<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrGenerateBunch extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity', 'status'
    ];
}
