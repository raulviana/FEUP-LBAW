<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('pages.profile', ['user' => $user]);
    }

    public function update(Request $resquest){
        return 123;
    }
}
