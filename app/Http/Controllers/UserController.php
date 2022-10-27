<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $data = User::getAll()->get();

        return view('user', [
            "data"  => $data
        ]);
    }
}
