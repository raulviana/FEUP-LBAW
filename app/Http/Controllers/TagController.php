<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($name){
        $uppercase_name = ucfirst(trans($name));

        $tag = Tag::where('name', 'like', $uppercase_name)->with('events')->get();

        return view('pages.event_search', ['tag' => $tag[0]]);
    }

}
