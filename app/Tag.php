<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tag';

    public function events() {
        return $this->belongsToMany('App\Event', 'event_tag', 'tag_id', 'event_id');        
    }
}
