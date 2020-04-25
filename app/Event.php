<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'event';

  /**
   * Owner of this event.
   */
  public function owner() {
    return $this->belongsTo('App\User', 'owner_id');
  }

  public function local(){
    return $this->belongsTo('App\Local', 'local_id');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag', 'event_tag', 'event_id', 'tag_id');        
  }

  public function photo() {
    return $this->belongsTo('App\EventPhoto');
  }
}
