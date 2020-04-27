<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Event;

class ReviewController extends Controller
{
    public function likeVote(Request $request){
        $validated_data = $request->validate([
            'event_id' => 'required'
        ]);

        $event_id = $validated_data["event_id"];
        $user_id = Auth::user()->id;

        DB::table('review')->updateOrInsert(
            ['event_id' => $event_id, 'user_id' => $user_id],
            ['score' => 1]
        );

        $event = Event::find($event_id);
        return response()->json([
            'review' => $event->review
        ], 200);
    }

    public function dislikeVote(Request $request){
        $validated_data = $request->validate([
            'event_id' => 'required'
        ]);

        $event_id = $validated_data["event_id"];
        $user_id = Auth::user()->id;

        DB::table('review')->updateOrInsert(
            ['event_id' => $event_id, 'user_id' => $user_id],
            ['score' => -1]
        );

        $event = Event::find($event_id);
        return response()->json([
            'review' => $event->review
        ], 200);
    }
}