<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    //
    protected $table = "transactions_type";


    protected $fillable = [
        'step1','step2','step3','step4','transaction_id',
        'current_step'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($trans){

	        $trans = \App\Model\TransactionFile::where("transaction_id",$trans->id)->get();

	        foreach($trans as $t){

	        	
	        	$t->delete();
	        }

        });
    }
    public function trans(){



    	return  $this->belongsTo('App\Model\Transaction','transaction_id');
    }

   
  
}
