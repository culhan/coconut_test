<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use KhanCode\LaravelBaseRest\BaseModel;

class User extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * admin scope
     *
     * @param [type] $query
     * @return void
     */
    public function scopeAdmin($query)
    {
        return $query->where("role_id", 'A');
    }

    /**
     * not admin scope
     *
     * @param [type] $query
     * @return void
     */
    public function scopeNotAdmin($query)
    {
        return $query->where("role_id", 'U');
    }

    /**
     * [scopeGetJoin description]
     *
     * @param   [type]  $query  [$query description]
     * @param   [type]  $data   [$data description]
     *
     * @return  [type]          [return description]
     */
    public function scopeGetJoin($query, $data = [])
    {
        return $query
                // start raw join query
                // end raw join query
                ;
    }

    /**
     * [scopeGetSelect description]
     *
     * @param   [type]  $query  [$query description]
     * @param   [type]  $data   [$data description]
     *
     * @return  [type]          [return description]
     */
    public function scopeGetSelect($query, $data = [])
    {
        if( Arr::get($data,'show_id',1) ){
            $query = $query->addSelect([
                DB::raw("(users.id) as 'id' ")
            ]);
        }
        if( Arr::get($data,'show_name',1) ){
            $query = $query->addSelect([
                DB::raw("(users.name) as 'name' ")
            ]);
        }
        if( Arr::get($data,'show_email',1) ){
            $query = $query->addSelect([
                DB::raw("(users.email) as 'email' ")
            ]);
        }

        return $query;
    }

    /**
     * [scopeGetUnion description]
     *
     * @param   [type]  $query  [$query description]
     * @param   [type]  $data   [$data description]
     *
     * @return  [type]          [return description]
     */
    public function scopeGetUnion($query, $data = [])
    {
        return $query
                // start list query union
                // end list query union
                ;
    }

    /**
     * [scopeGetOption description]
     *
     * @param   [type]  $query  [$query description]
     * @param   [type]  $data   [$data description]
     *
     * @return  [type]          [return description]
     */
    public function scopeGetOption($query, $data = [])
    {
        return $query
                // start list query option
                // end list query option
                ;
    }

    /**
     * [scopeGetAll description]
     *
     * @param   [type]  $query  [$query description]
     * @param   [type]  $data   [$data description]
     *
     * @return  [type]          [return description]
     */
    public function scopeGetAll($query, $data = [])
    {
        return $query->getJoin($data)
                    ->getSelect($data)                
                    ->getOption($data)
                    ->getUnion($data);
    }

    public function UsersDeleteRequestAddress(){
        return $this->hasMany(UsersDeleteRequestAddress::class, 'user_id', 'id');
    }
}
