<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($name){
        $tag = Tag::where('name', 'Theater')->get();

        return $tag;
    }

}
