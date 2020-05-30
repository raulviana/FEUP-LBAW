<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function create()
    {
        // User can only review events if he's logged in
        return Auth::check();
    }

    
}
