<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestroImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'image', 'image_type','status'
    ];

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        return url('storage/image/'. $this->image);
    }
}
