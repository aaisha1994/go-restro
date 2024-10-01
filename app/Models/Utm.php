<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'name', 'ref_code', 'status',
    ];

    public function Restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
}
