<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   // protected $appends = ['name'];

    /**
     * The events this user owns.
     */
    public function events() {
      return $this->hasMany('App\Event');
    }


    /**
     * The posts that were written by the user
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }

    /**
     * The events where user is a collaborator
     */
    public function collaborates(){
        return $this->belongsToMany('App\Event', 'collaborators_event', 'user_id', 'event_id');
    }

    public function invites(){
        return $this->hasMany('App\Invitation');
    }

    public function wasInvited(){
        return $this->hasMany('App\Invitation');
    }

}
