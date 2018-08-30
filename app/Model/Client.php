<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $table = "client";


    protected $fillable = [
    	'Fname',
    	'Lname',
    	'email',
    	'firm',
    	'phone',
    	'broker',
    	'side',
    	
    ];

    public function address()
    {
        return $this->belongsTo('App\Model\Address','address_id');
    }


    public function name(){

    	return $this->Fname." ".$this->Lname;
    }
}
