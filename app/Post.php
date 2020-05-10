<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'post';
    public $timestamps  = false;


    public function event(){
        return $this->belongsTo('App\Event', 'event_id');
    }

    public function writer(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
