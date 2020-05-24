<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        if(!is_null($request->file('upload-photo'))){
            $old_photo = $user->photo;
            Storage::delete('/public/users/' . $old_photo);
            $path = $request->file('upload-photo')->store('/public/users');
            $filename = basename($path);
            
            $user->photo = $filename;
        }
        $user->save();
        Log::info('User ' . $user->name . ' with id:' . $user->id . ' updated profile');
        return redirect('/profile/'.$id)->with('success', 'Your profile is up to date!');     
    }

    public function delete(Request $request){
        $user = User::find($request['id']);

        try{
            $user->is_active = false;
            $user->save();

            Log::info('Banned user '.$user['name']);

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
            Log::warning('User ' . $user->name . ' with id:' . $user->id . ' was not found during UserController@restore');
            $request->session()->flash('error', 'Ups! User was not suspended');
            return response()->json($user, 404);
        } 
    }


    public function events($id){
        $user = User::find($id);

        $invited_to = $user->wasInvited()->get();
        $own_by = $user->events()->get();
        $collaborates_in = $user->collaborates()->get();

        return view('pages.profile.my_events', ['invitedTo' => $invited_to, 'collaboratingIn' => $collaborates_in, 'myEvents' => $own_by]);
    }
        
}
