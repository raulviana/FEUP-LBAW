<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('pages.profile', ['user' => $user]);
    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        if(!is_null($request->input('name'))){
            $user->name = $request->input('name');
        }
        
        if(!is_null($request->input('email'))){
            $user->email = $request->input('email');
        }
       
        if(!is_null($request->input('password'))){
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = $request->input('password');
        }

        if(!is_null($request->input('about'))){
            $user->about = $request->input('about');
        }
       
        $user->save();

        return redirect('/profile/'.$id);     
    }
}
