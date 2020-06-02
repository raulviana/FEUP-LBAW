<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvitationController extends Controller
{
    public function delete(Request $request){
        $invitation = Invitation::find($request['invite_id']);
        $invitation->delete();

        return response()->json(['invite_id' => $invitation->id, 'event_id' => $invitation->event_id, 'invited_id' => $invitation->invited_id ],  200);
    }

    public function reject(Request $request){
        $invitation = Invitation::find($request['invite_id']);
        $invitation->accepted = false;
        $invitation->save();

        return response()->json(['invite_id' => $invitation->id]);
    }

    public function accept(Request $request){
        $invitation = Invitation::find($request['invite_id']);
        $invitation->accepted = true;
        $invitation->save();

        return response()->json(['invite_id' => $invitation->id]);
    }

    public function send(Request $request){
        $users = User::where('email', $request['query'])->get();
    

        if(count($users) == 1){
            $user = $users[0];

            $candidate = DB::table('invitation')->where('event_id', '=', $request['event_id'])
                                                        ->where('invited_id', '=', $user->id)
                                                        ->get();

            if(count($candidate) == 0){
                $invitation = new Invitation;
                $invitation->inviter_id = Auth::user()->id;
                $invitation->invited_id = $user->id;
                $invitation->event_id = $request['event_id'];
                $invitation->message = $request['message'] ? $request['message'] : "Hello! I am inviting you to my event!";
                $invitation->save();

                return response()->json(['invite_id' => $invitation->id, 'user_id' => $user->id, 'user_name' => $user->name], 200);
            }      
            else {
                Log::error('Unable to add collaborator to event with id:' . $request['event_id'] . ' - internal error (500)');
                return response()->json($user, 500);
            }

                     
        }
        Log::error('Unable to add collaborator to event with id:' . $request['event_id'] . ' - not found (404)');
        return response()->json([], 404);
    }
}
