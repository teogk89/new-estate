<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionFile extends Model
{
    //

    protected $table = "transaction_file";



    public static function boot()
    {
        parent::boot();

        static::deleting(function($file){

        	\Storage::disk('public')->delete($file->path);

        });
    }




    
}
