<?php

namespace App\Http\Controllers;

 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Storage;

use DB;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Event;
use Carbon\Carbon;

class PostController extends Controller
{
    public function store(Request $request){
       $this->authorize('create', Post::class);

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

        $posts = DB::table('post')->where('event_id', '=', $request['id'])->get();
        $event = Event::find($request['id']);
        $eventTitle = $event->title;
        foreach($posts as $post){
            $post->post_time = Carbon::parse($post->post_time)->format('Y-m-d h:i:s');
            $user = User::find($post->user_id);
            
            $post->user_id = $user->name;
        }
    
        return view('pages.admin.manage-events-posts', ['posts' => $posts, 'event_title' => $eventTitle]);
    }

    public function edit(Request $request){
        
        $this->validate($request, [
            'content' => 'required'
        ]);

        $post = Post::find($request['postid']);

        $post->content = $request['content'];
        $post->update();

        return response()->json(['new_content' => $post->content],200);
    }

    public function delete(Request $request){
        $post = Post::find($request['postid']);
        $post->delete();
        return response()->json(['postID' => $post->id], 200);
    }
}
