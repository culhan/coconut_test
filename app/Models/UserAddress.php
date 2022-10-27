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
        "lat",
        "lng"
    ];

    public $timestamps = false;

    /**
     * relation
     *
     * @return void
     */
    public function UsersDeleteRequestAddress(){
        return $this->hasOne(UsersDeleteRequestAddress::class, 'address_id', 'id');
    }
    
    /**
     * boot function
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }
}
