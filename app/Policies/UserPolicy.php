<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user){
        /* Any logged user can update his own profile */
        return Auth::user()->id == $user->id;
    }

    public function myevents(User $user){
        return Auth::user()->id == $user->id;
    }

}
