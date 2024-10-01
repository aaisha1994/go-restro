<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrGenerate extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_bunch_id','restro_id', 'qr_code', 'type', 'status','affiliate_id'
    ];
}
