<?php

namespace App\Http\Controllers;

use App\Event;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function show(){

        $events = Event::with('owner', 'local')->get();

        return view('pages.homepage', ['events' => $events]);
    }
}
