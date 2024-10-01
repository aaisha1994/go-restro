<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestroFacility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'facility_id','status'
    ];

    public function Facility()
    {
        return $this->hasOne(Facility::class, 'id', 'facility_id');
    }
}
