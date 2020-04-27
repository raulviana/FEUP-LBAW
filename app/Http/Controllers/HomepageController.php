<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Event;


class HomepageController extends Controller
{

    const ITEMS_PER_PAGE = 10;

    public function display(){
        $events = Event::where('is_active', true)->get();
        return view('pages.homepage', ['events' => $events]);
    }

    public function faq(){
        return view('pages.static.faq');
    }

    public function about(){
        return view('pages.static.aboutus');
    }
}
