<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillablee = [
        'name', 
        'email',
        'password',
        'Fname'
        
    ];

    protected $fillable = [
        'Fname',
        'Lname',
        'reco_number',
        'treb',
        'hst_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function transactions(){


        return $this->hasMany('App\Model\Transaction','user_id');
    }


    public function clients(){

        return $this->hasMany('App\Model\Client', 'user_id');

    }
}
