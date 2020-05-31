<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class Recovery extends Controller
{
   public function recover (Request $request){
    $user = DB::table('users')->where('email', '=', $request->email)->first();
    $id = $user->id;
    if($user != null){
      $new_pass = str_random(13);
      $hash_pass =  bcrypt($new_pass);
      DB::table('users')->where('id', $id)->update(['password' => $hash_pass]);

      if($this->sendEmail($user, $new_pass)){
        Log::info('User ' . $user->name . ' with id:' . $user->id . ' asked for a new password - mail sent');
        return redirect('/login')->with('success', 'Your new passord has been sent to your e-mail!'); 
      }
      else{
        Log::warning('Error sending password recover e-mail to user ' . $user->name . ' with id:' . $user->id . ' - mail not send');
        return redirect('/login')->withErrors('Impossible to send the e-mail, please try again!');
      }
    }
    else{
      Log::info('E-mail ' . $request->email . ' tried to recover password - no record');
      return redirect('/login')->withErrors('This e-mail isnt in our records!');
    }
  }
 
  public function sendEmail($user, $new_pass){
    $to_name = $user->name;
    $to_email = $user->email;
    $data = array('name'=>"ArtNow", 'pass' => $new_pass);
    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
    ->subject('Password Recovery - ArtNow');
    $message->from('art.now.events@gmail.com','ArtNow');
    });
    return true;
  }




    

}
