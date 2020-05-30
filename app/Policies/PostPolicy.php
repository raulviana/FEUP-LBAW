<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function create()
    {
        // User can only create events if hes logged in
        return Auth::check();
    }
}
