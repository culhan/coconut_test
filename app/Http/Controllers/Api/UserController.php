<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserPublicApiRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Api list function
     *
     * @param UserAdminRequest $request
     * @return void
     */
    public function ApiList()
    {
        $data = User::NotAdmin()
            ->when(request('email',false), function ($query) {                
                $query->where("email", "like", request('email')."%");
            })
            ->get();

        return (UserResource::collection($data))
            ->additional([
                'status'    => 200,
                'error' => 0
            ]);
    }
}
