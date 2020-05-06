<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Event;
use App\EventCollaborators;
use App\User;
use App\Tag;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{

    public function list(){
        $events = Event::with('owner', 'local', 'tags', 'posts')->get();

        return view('pages.events', ['events' => $events]);
    }

    public function show($id)
    {
      $event = Event::find($id);
      
      return view('pages.event', ['event' => $event]);
    }

    public function create()
    {
        return view('pages.event_create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'local' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'details' => 'required',
            'upload-photo' => 'required'
        ]);
        $path = $request->file('upload-photo')->store('/public/event_photo');
        $filename = basename($path);
        $event = new Event;
        
        $event->title = $request->input('title');
        $event->details = $request->input('details');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');


        $event->photo = $filename;
        if($request->input('is_private') == 'off')
            $event->type = 'public';
        else
            $event->type = 'private';
            
        $event->owner_id = Auth::user()->id;

        $event->local_id = $this->addLocal($request['local']);

        $event->save();

        if($request['tag_theater']) $this->addTag('Theater', $event->id);
        if($request['tag_sculpture']) $this->addTag('Sculpture', $event->id);
        if($request['tag_dance']) $this->addTag('Dance', $event->id);
        if($request['tag_music']) $this->addTag('Music', $event->id);
        if($request['tag_paintings']) $this->addTag('Painting', $event->id);
        if($request['tag_comedy']) $this->addTag('Comedy', $event->id);
        if($request['tag_literature']) $this->addTag('Literature', $event->id);
        if($request['tag_others']) $this->addTag('Others', $event->id);
    
        return redirect('/')->with('success', 'Event created with sucess!');
    }

    public function edit($id){
        $event = Event::find($id);
        return view('pages.event_create', ['event' => $event]);
    }

    public function update(Request $request){
        $event = Event::find($request['id']);
       

        if(!is_null($request->input('title'))){
            $event->title = $request->input('title');
        }
        
        if(!is_null($request->input('local'))){
            $event->local_id = $this->addLocal($request->input('local'));
    
        }
       
        if(!is_null($request->input('start_date'))){
            $event->start_date = $request->input('start_date');
    
        }

        if(!is_null($request->input('end_date'))){
            $event->start_date = $request->input('start_date');
    
        }

        if(!is_null($request->input('details'))){
            $event->details = $request->input('details');
    
        }
       
        $event->save();

        return redirect('/events/'.$event->id)->with('success', 'Your event is up to date!');    
    }

    public function delete(Request $request){
        $event = Event::find($request['id']);
       
        try{
            $event->is_active = false;
            $event->save();

            $request->session()->flash('success', $event->title.' was deleted');
            return response()->json($event, 200);
        } catch(ModelNotFoundException $e){
            $request->session()->flash('error', 'Ups! The event was not deleted');
            return response()->json($event, 404);
        } 

    }

    public function removeCollaborator(Request $request){
        $row = EventCollaborators::where('event_id', $request['event_id'])
                                ->where('user_id', $request['user_id'])
                                ->get();

        try{
            ($row[0])->delete();
            $request->session()->flash('success', 'Collaborator was removed');
            return response()->json($row[0]);
        } catch(ModelNotFoundException $e){
            $request->session()->flash('error', 'Ups! Cant remove collaborator');
            return response()->json([], 404);
        }
    }

    public function addCollaborator(Request $request){
        $users = User::where('email', $request['query'])->get();

        if(count($users) == 1){
            $user = $users[0];

            //TODO: como saber se foi update or insert ?
            DB::table('collaborators_event')->updateOrInsert(
                ['event_id' => $request['event_id'], 'user_id' => $user->id]
            );

            return response()->json($user, 200);
        }
        
        return response()->json([], 404);
    }

    public function addTag($tag_name, $event_id){
        $tag = Tag::where('name', 'like', $tag_name)->get();

        DB::table('event_tag')->updateOrInsert(
            ['event_id' => $event_id, 'tag_id' => $tag[0]->id]
        );
    }

    public function addLocal($local_name){
        $idLocal = DB::table('local')->insertGetId(
            ['name' => $local_name]
        );

        return $idLocal;
    }
}
