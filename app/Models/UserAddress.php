<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    public $table = "users_address";

    public $fillable = [
        "address",
        "user_id",
        "is_default",
    ];

    public $timestamps = false;
}
