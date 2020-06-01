<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\RecoverPass;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class Recovery extends Controller
{
   public function recover (Request $request){
    $user = DB::table('users')->where('email', '=', $request->email)->first();
    
    if($user != null){
      $id = $user->id;
      $new_pass = str_random(13);
      $hash_pass =  bcrypt($new_pass);
      DB::table('users')->where('id', $id)->update(['password' => $hash_pass]);
      Mail::to($user)->send(new RecoverPass($user, $new_pass));
     
      Log::info('User ' . $user->name . ' with id:' . $user->id . ' asked for a new password - mail sent');
      return redirect('/login')->with('success', 'Your new passord has been sent to your e-mail!'); 
  }
    else{
      Log::info('E-mail ' . $request->email . ' tried to recover password - no record');
      return redirect('/login')->withErrors('This e-mail isnt in our records!');
    }
  }
 
  




    

}
