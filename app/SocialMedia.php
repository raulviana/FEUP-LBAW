<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    #public $table = 'social_media';

    public function events() {
        return $this->belongsToMany('App\Event', 'event_social_media', 'social_media_id', 'event_id');        
    }
}
