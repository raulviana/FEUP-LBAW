<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    const USER_MAXPAG = 7;

    public function users(){
        $users = User::where('admin', 'false')->paginate(AdminController::USER_MAXPAG);
        $s_users = User::onlyTrashed()->paginate(AdminController::USER_MAXPAG);

        return view('pages.admin.manage-users', ['users' => $users, 'susp_users' => $s_users]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return response()->json($user);
    }

    public function restoreUser($id){

    }

    public function events(){
        return 123;
    }
}
