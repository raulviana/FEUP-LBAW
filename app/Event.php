<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'event';
  protected $primaryKey = 'event_id';

  /**
   * Owner of this event.
   */
  public function owner() {
    return $this->belongsTo('App\User', 'owner_id');
  }

  public function local(){
    return $this->belongsTo('App\Local', 'local');
  }

}
