<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = "address";

    protected $fillable = [
       
        'suite',
        'street',
        'street_name',
        'city',
        'province',
        'postal'
        
    ];

    public function fullAddress(){


    	$string = ["city","postal","province"];

    	$result = $this->street." ".$this->street_name."<br/> ";
    	foreach($string as $str){

    		$result .= $this[$str]."<br/>";

    	}
    	return $result;
    }

    public function transAddress(){

        return $this->suite."<br/>".$this->fullAddress();
    }
}
