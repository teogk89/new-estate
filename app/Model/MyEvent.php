<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MyEvent extends Model
{
    //
    protected $table ="my_event";

    public $timestamps = false;
    protected $fillable = [
    	'when',
    	'name',
    	'des',
    	'require'
    ];

    public function setDate($input){

    	$this->when = $this->convertDate($input);
    }
    public function convertDate($input){

    	$date =  \DateTime::createFromFormat("m/d/Y g:i A",$input);
    	return $date->format('Y-m-d H:i:s');

    }


    /*public function getWhenAttribute($value){
  		
  		if($value == null){

  			return null;
  		}
    	$date =  \DateTime::createFromFormat("Y-m-d H:i:s",$value);

  		return $date->format("m/d/Y g:i A");
    }*/

    public function getWhen2(){

        if($this->when == null){

            return null;
        }
        $date =  \DateTime::createFromFormat("Y-m-d H:i:s",$this->when);

        return $date->format("m/d/Y g:i A");
      
    }

    public function setWhenAttribute($value){

    	$date =  \DateTime::createFromFormat("m/d/Y g:i A",$value);
    

    	$this->attributes['when'] = $date->format('Y-m-d H:i:s');

    }


    public function attends(){


    	return $this->hasMany('\App\Model\EventAttend',"event_id");


    }


        
}
