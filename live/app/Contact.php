<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   	protected $fillable = ['company_name','phone_number','status','email','country','state','city','suburb','street_address','postal_code','fb_link','twitter_link','skype_id','linkedin_address','instagram_address','pinterest_address'];
   	protected $table = 'contacts';
}
