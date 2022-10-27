<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDeleteRequestAddress extends Model
{
    use HasFactory;

    public $table = "users_delete_request_address";

    public $timestamps = false;

    public $fillable = [
        "user_id",
        "address_id",
        "is_confirmed"
    ];
}
