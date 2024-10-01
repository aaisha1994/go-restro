<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'subject', 'message', 'reply', 'account_type', 'reply_by', 'status',
    ];

    public static $AccountType = [
        '1' => 'Customer',
        '2' => 'Restro',
        '3' => 'Affiliate',
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Restro()
    {
        return $this->hasOne(Restro::class, 'id', 'user_id');
    }

    public function Affiliate()
    {
        return $this->hasOne(Affiliate::class, 'id', 'user_id');
    }
}
