<?php
// File ini ini di  buat dengan Laravel Rest Builder,
// Jika ada perubahan tambahkan code diantara comment "start custom code" dan "end custom code" di akhir file
// atau hubungi A'mal Sholihan
namespace App\Models;

use KhanCode\LaravelBaseRest\Helpers;
use KhanCode\LaravelBaseRest\BaseModel;
use Illuminate\Support\Arr;

class UserGenerated extends BaseModel
{
    public $table = "users";

    // start list option

    public $fillable = [
		"id",
		"name",
		"email",
		"email_verified_at",
		"password",
		"remember_token",
		"created_at",
		"updated_at",
    ];
            
    public $appends = [

    ];
            
    // end list option    

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
                \DB::raw("(users.id) as 'id' ")
            ]);
        }
		if( Arr::get($data,'show_name',1) ){
            $query = $query->addSelect([
                \DB::raw("(users.name) as 'name' ")
            ]);
        }
		if( Arr::get($data,'show_email',1) ){
            $query = $query->addSelect([
                \DB::raw("(users.email) as 'email' ")
            ]);
        }

        return $query;
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

    // start list accessor function

    // end list accessor function

    // start list relation function
    
    // end list relation function

    // start custom code    
    // end custom code
    
    /**
     * [boot description]
     * @return [type] [description]
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){

            // start list creating option

            // end list creating option  

        });

        self::updating(function($model){
            
            // start list updating option

            // end list updating option

        });

        self::deleting(function($model){
            
            // start list deleting option

            // end list deleting option

        });
    }
}