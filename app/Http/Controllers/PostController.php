<?php

namespace App\Http\Controllers;

 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function store(Request $request){
       
        $user_name = Auth::user()->name;
        $user_photo = Storage::url('users/'. Auth::user()->photo);
        
        
        $post = new Post();
        

        $post->user_id = $request->input('userid');
        $post->event_id = $request->input('eventid');
        $post->content = $request->input('content');
        $post->post_time = Carbon::now('UTC'); //param => timezone

        $post->save();

        $post->post_time = Carbon::parse($post->post_time)->format('Y-m-d h:i:s');
        $out = array($post, $user_name, $user_photo);

        return $out;
    }

    public function get(Request $request){

        $posts = Post::where('event_id',  $request['id']);
            
        return view('pages.admin.manage-events-posts', ['posts' => $posts]);
    }
}
