<?php
namespace App\Http\Controllers\Api;

use App;
use Request;
use App\Models\User;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * [lists description]
     * @return [type] [description]
     */
    public function test(TestRequest $request)
    {
        $data = User::getAll()
            ->setSortableAndSearchableColumn([
                "id"    => "id",
                "name"  => "name",
                "email" => "email",
            ])
            ->search()
            ->paginate();
        
        return (App\Http\Resources\UserResource::collection($data))
                ->additional([
                    'status'    => 200,
                    'error' => 0
                ]);
    }

    // end list function

    // start custom code    
    // end custom code
}