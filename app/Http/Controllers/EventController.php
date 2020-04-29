<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Event;
use App\EventCollaborators;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            'photo' => 'required'
        ]);

        $path = $request->file('photo')->store('/event_photo');
        $filename = basename($path);
        $event = new Event;
        
        $event->title = $request->input('title');
        $event->details = $request->input('details');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->local_id = 1;
        $event->photo = $filename;
        if($request->input('is_private') == 'off')
            $event->type = 'public';
        else
            $event->type = 'private';
            
        $event->owner_id = Auth::user()->id;

        $event->save();
        
        return redirect('/')->with('success', 'Event created with sucess!');
    }

    public function edit($id){
        $event = Event::find($id);
        return view('pages.event_create', ['event' => $event]);
    }

    public function update(Request $request){
        return 123;
    }

    public function delete(Request $request){
        $event = Event::find($request['id']);
        
        try{
            $event->is_active = false;
            $event->save();

            $request->session()->flash('success', $event->title.' was deleted');
            return response()->json([], 200);
        } catch(ModelNotFoundException $e){
            
            $request->session()->flash('error', 'Ups! The event was not deleted');
            return response()->json([], 404);
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
}
