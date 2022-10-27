<?php
// File ini ini di  buat dengan Laravel Rest Builder,
// Jika ada perubahan tambahkan code diantara comment "start custom code" dan "end custom code" di akhir file
// atau hubungi A'mal Sholihan
namespace App\Http\Controllers\Api;

use App;
use Request;
use App\Http\Services\UserGeneratedService;
use App\Http\Controllers\Controller;

class UserGeneratedController extends Controller
{    

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->service = new UserGeneratedService;
    }

    // start list function
    
    /**
     * [list description]
     * @return [type] [description]
     */
    public function list()
    {
        $data = $this->service->getListData([
                // start list column
                "id" => "id",
				"name" => "name",
				"email" => "email",
				// end list column
            ],[
                // start list relation column
                // end list relation column
            ],Request::all());
        
        if( get_class($data) != "Illuminate\Pagination\LengthAwarePaginator" ){
            return $data;
        }

        return (App\Http\Resources\UserGeneratedResource::collection($data))
                ->additional([
                    'sortableAndSearchableColumn' =>    $data->sortableAndSearchableColumn,
                    'relationColumn'    =>  $data->relationColumn,
                    'status'    => 200,
                    'error' => 0
                ]);
    }

    // end list function

    // start custom code    
    // end custom code
}