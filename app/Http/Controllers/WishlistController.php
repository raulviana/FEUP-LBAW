<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function add(Request $request){
        $this->authorize('add', Wishlist::class);

        $wishlist = new Wishlist;

        $wishlist->user_id = Auth::user()->id;
        $wishlist->event_id = $request['event_id'];

        $wishlist->save();

        $request->session()->flash('success', 'The event was added to your wishlist');
        return response()->json($wishlist, 200);
    }

    public function remove(Request $request){
        $wishlist = Wishlist::where([
            ['event_id',$request['event_id']],
            ['user_id', Auth::user()->id]
            ])->first();
        
        $wishlist->delete();

        $request->session()->flash('success', 'The event was removed from your wishlist');
        return response()->json($wishlist, 200);                     
    }
}
