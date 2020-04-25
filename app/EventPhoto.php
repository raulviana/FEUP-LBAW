<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPhoto extends Model
{
    public $table = 'event_photo';

    public function events() {
        return $this->hasOne('App\Event');        
      }
}
