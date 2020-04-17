<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Event;


class HomepageController extends Controller
{

    const ITEMS_PER_PAGE = 10;

    public function display(){
        $events = Event::all();
        return view('pages.homepage', ['events' => $events]);
    }
}
