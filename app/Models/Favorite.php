<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'restro_id', 'user_id'
    ];

    public function Restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restro_id');
    }
}
