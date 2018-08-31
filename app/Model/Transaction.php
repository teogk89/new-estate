<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';


    protected $fillable = [
        'condition',
        'mls_number',
        'price',
        'deposit',
        'further_deposit',
        'client_id',
        'lawyer_id',
        'sale_id',
        'referral_id',
        'admin_status',
        'commission',
        'hst_number',
        'reason_status',
        'status'
        
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($trans){

            

        });
    }


    public function getDate($input){


    	$fill = [
    		'condition_expire',
    		'accept_date',
    		'completion_date',
    		'deposit_date',
    		'trade_record',
            'close_date'
    	];

    	foreach($fill as $f){

    		if(isset($input[$f]) && $input[$f] != ""){

    			$this->$f = $this->convertTime($input[$f]);
    		}

    	}
    }
    public function type(){


        return $this->hasOne('App\Model\TransactionType','id',"transaction_id");
    }
    public function client(){


        return $this->hasOne('App\Model\Client','id','client_id');

    }

    public function user(){

        return $this->belongsTo('App\User',"user_id");
    }
    public function address(){


        return $this->hasOne("App\Model\Address","id","address_id");
    }




    protected function convertTime($input){

    	$date =  \DateTime::createFromFormat('m/d/Y',$input);
    	return $date->format('Y-m-d');
    	//return \DateTime::createFromFormat('d-m-Y',$input);
    }


    public function dateOut($input){


    	$date = \DateTime::createFromFormat('Y-m-d',$this->$input);

        if($date == false){

            return "";
        }
    	return $date->format('m/d/Y');

    }
}
