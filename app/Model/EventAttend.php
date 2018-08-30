<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventAttend extends Model
{
    //
    protected $table = "event_attend";


    public $timestamps = false;

    public function user(){


    	return $this->belongsTo('App\User', 'user_id');

    }

    public function events(){


    	return $this->belongsTo('App\Model\MyEvent',"event_id");
    }

    
  
}
