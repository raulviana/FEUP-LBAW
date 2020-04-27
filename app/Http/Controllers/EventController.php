<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Event;
use App\User;
use Auth;

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

    public function showWithTag($id){
        
        return 123;
    }

}
