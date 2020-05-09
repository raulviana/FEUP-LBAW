<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    const USER_MAXPAG = 7;

    public function users(){
        $users = User::where('admin', 'false')->paginate(AdminController::USER_MAXPAG);


        return view('pages.admin.manage-users', ['users' => $users]);
    }

    public function deleteUser($id){
        try{
            $user = User::find($id);
            $user->delete();

            return response()->json($user, 200);
        }
        catch(ModelNotFoundException $e){
            return response()->json($user, 400);
        }
    }

    public function restoreUser($id){

    }

    public function events(){
        $events = Event::with('owner', 'local', 'tags', 'posts')->get();
        return view('pages.admin.manage-events', ['events' => $events]);
    }

    
}
