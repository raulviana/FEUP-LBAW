<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{

    protected $table = 'invitation';

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function inviter(){
        return $this->belongsTo('App\User', 'inviter_id');
    }

    public function invited(){
        return $this->belongsTo('App\User', 'invited_id');
    }
}
