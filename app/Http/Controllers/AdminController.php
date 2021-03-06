<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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
            Log::info('User '.$user->name . ' with id:' . $user->id . 'banned');
            return response()->json($user, 200);
        }
        catch(ModelNotFoundException $e){
            Log::error('Couldnt ban user '. $user->name . ' with id:' . $user->id . ' - not found');
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
