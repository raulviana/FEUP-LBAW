<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Event;


class EventController extends Controller
{

    public function list(){
        $events = Event::with('owner', 'local')->get();

        return view('pages.events', ['events' => $events]);
    }

    public function show($id)
    {
      $event = Event::find($id);

//      $this->authorize('show', $card);

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
            'details' => 'required'
        ]);
        
        return $request;
    }

    
}
