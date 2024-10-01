<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestroCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restro_id', 'category_id','status'
    ];

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
