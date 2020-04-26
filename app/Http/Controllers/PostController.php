<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    public function store(Request $request){
       
        $post = new Post();

        $post->user_id = $request->input('userid');
        $post->event_id = $request->input('eventid');
        $post->content = $request->input('content');
        $post->post_time = Carbon::now('UTC'); //param => timezone

        $post->save();

        return $post;
    }
}
