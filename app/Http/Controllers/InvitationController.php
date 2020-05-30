<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

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
}
