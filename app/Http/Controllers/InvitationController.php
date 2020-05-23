<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InvitationController extends Controller
{
    public function delete(Request $request){
                
        $invitation = Invitation::find($request['invite_id']);
        $invitation->delete();

        return response()->json(['invite_id' => $invitation->id, 'event_id' => $invitation->event_id ],  200);
    }
}
