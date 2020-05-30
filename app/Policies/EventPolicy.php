<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;

use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function create()
    {
        // User can only create events if it logged in
        return Auth::check();
    }

    public function delete(User $user, Event $event){
        // User can delete an event if he is logged in or if he is admin, or if the owns the event
        return $user->collaborates->contains($event) || $user->admin || $user->events->contains($event);
    } 
    
    public function update(User $user, Event $event) { 
        // User can update an event if he is logged in or if he is admin, or if the owns the event
        return $user->collaborates->contains($event) || $user->admin || $user->events->contains($event);
    }

    public function is_active(User $user, Event $event){
        // Only an active event can be displayed.
        return $event->is_active;
    }
}
