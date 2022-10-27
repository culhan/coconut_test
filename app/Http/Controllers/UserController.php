<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdminRequest;
use App\Http\Requests\UserPublicApiRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * list for admin function
     *
     * @param UserAdminRequest $request
     * @return void
     */
    public function listForAdmin(UserAdminRequest $request)
    {
        $data = User::getAll()
            ->NotAdmin()
            ->when(request('range',false), function ($query) {                
                $query->whereRaw("(
                    SELECT 
                    111.111 *
                        DEGREES(ACOS(LEAST(1.0, COS(RADIANS(users_address.lat))
                            * COS(RADIANS(?))
                            * COS(RADIANS(users_address.lng - ?))
                            + SIN(RADIANS(users_address.lat))
                            * SIN(RADIANS(?))))) AS distance_in_km
                    FROM users_address
                    where users_address.user_id = users.id
                    HAVING distance_in_km <= ?
                    limit 1
                ) is not null", [request('lat'), request('lng'), request('lat'), request('range')]);
            })
            ->get();

        return view('user', [
            "data"  => $data,
            "range" => request('range','')
        ]);
    }
}
