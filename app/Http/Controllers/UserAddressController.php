<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress as UserAddrressModel;
use App\Http\Requests\UserAddressRequest;

class UserAddressController extends Controller
{
    public function list()
    {        
        $data = UserAddrressModel::Where('user_id', auth()->user()->id)
                ->get();
        
        return view('user_address', [
            "data"  => $data
        ]);
    }

    public function create()
    {
        return view('user_address_form', [
            "status"    => "success",
            "user_id"   => auth()->user()->id,
        ]);
    }

    public function createAction(UserAddressRequest $request)
    {
        if($request->get('is_default',0) == 1){
            UserAddrressModel::Where('user_id', auth()->user()->id)->update([
                "is_default"    => 0
            ]);
        }
        
        UserAddrressModel::create($request->all());        

        return redirect('userAddress')->with('status', 'Address added');;
    }

    public function deleteRequest($id)
    {
        event(new \App\Events\UserDeleteRequest($id));

        return redirect('userAddress')->with('status', 'Delete Address Requested');
    }

    public function userAddress($id)
    {
        $data = UserAddrressModel::Where('user_id', $id)
                ->whereRaw("
                    (
                        select users_delete_request_address.id
                        from users_delete_request_address
                        where users_delete_request_address.address_id = users_address.id
                        limit 1
                    ) is not null
                ")
                ->get();
        
        return view('user_address', [
            "data"  => $data
        ]);
    }
}
