<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveReject extends Model
{
    use HasFactory;

    protected $fillable = [
        'restro_id', 'details', 'type', 'status'
    ];

    protected $casts = [
        'details' => 'json',
    ];

    public function Restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
}
