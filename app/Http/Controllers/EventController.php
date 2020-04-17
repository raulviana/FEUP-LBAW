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

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return $event;
    }
}
