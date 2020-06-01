<?php

namespace App\Policies;

use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class WishlistPolicy
{
    use HandlesAuthorization;

    public function add(){
        return Auth::check();
    }
}
