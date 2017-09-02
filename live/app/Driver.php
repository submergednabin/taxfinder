<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
	use Notifiable;
    protected $fillable = ['fullname','phone_number','email','status','image','password','username'];
     protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table = 'drivers';
}
