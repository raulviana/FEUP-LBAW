<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('pages.profile.profile', ['user' => $user]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('pages.profile.edit_profile', ['user' => $user]);
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
            $user->password = bcrypt($request->input('password'));
        }

        if(!is_null($request->input('about'))){
            $user->about = $request->input('about');
        }
       
        $user->save();

        return redirect('/profile/'.$id)->with('success', 'Your profile is up to date!');     
    }

    public function delete(Request $request){
        $user = User::find($request['id']);

        try{
            $user->is_active = false;
            $user->save();

            return response()->json($user, 200);
        } catch(ModelNotFoundException $e){
            
            $request->session()->flash('error', 'Ups! User was not suspended');
            return response()->json($user, 404);
        } 
    }

    public function restore(Request $request){
        $user = User::find($request['id']);

        try{
            $user->is_active = true;
            $user->save();

            return response()->json($user, 200);
        } catch(ModelNotFoundException $e){
            
            $request->session()->flash('error', 'Ups! User was not suspended');
            return response()->json($user, 404);
        } 
    }


    public function search(Request $request){
        $query = $request['searchField'];
        if($query != ''){
            $users = User::where('is_active', true)
                        ->where('name', 'like', '%'.$query.'%')
                        ->orWhere('email', 'like', '%'.$query.'%')
                        ->orderBy('id', 'asc')
                        ->get();

            return response()->json($users, 200);
        }
        else{

            return response()->json($users, 404);
        }
    }
        
}
