<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //

    protected $table = "file_form";

    public static function boot()
    {
        parent::boot();

        static::deleting(function($file){

        	\Storage::disk('public')->delete($file->path);

        });
    }


    protected $fillable = [
    	'name',
    	'des',
    	'user_id'
    ];
}
