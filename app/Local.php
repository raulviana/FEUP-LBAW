<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
      // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'local';
    protected $primaryKey = 'local_id';

 
    public function events(){
        return $this->hasMany('App\Event');
    }
}
