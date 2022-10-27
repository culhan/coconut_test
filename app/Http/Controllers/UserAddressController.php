<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress as UserAddrressModel;
use App\Http\Requests\UserAddressRequest;
use App\Http\Requests\UserAddressDelete;

class UserAddressController extends Controller
{
    public function list()
    {
        $data = UserAddrressModel::Where('user_id', auth()->user()->id)->get();

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
        if($request->is_default == 1){
            UserAddrressModel::Where('user_id', $request->user_id)->update([
                "is_default"    => 0
            ]);
        }
        
        UserAddrressModel::create($request->all());        

        return redirect('userAddress');
    }

    public function delete(UserAddressDelete $request, $id)
    {
        // event(new \App\Events\CustomerNotification($result->id, 1, 2));
    }
}
