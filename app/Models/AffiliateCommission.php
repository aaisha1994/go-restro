<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'per_download', 'per_purchase', 'status'
    ];
}
