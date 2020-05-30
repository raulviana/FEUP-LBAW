<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Recovery extends Controller
{
   public function recover (Request $request){
    $user = DB::table('users')->where('email', '=', $request->email)->first();
    dd($user);

        return redirect('/login')->with('success', 'Your new passord has been sent to your e-mail!');  
   }
}
