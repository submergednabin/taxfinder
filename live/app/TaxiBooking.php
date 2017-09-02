<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiBooking extends Model
{
    protected $fillable = ['pickup_date','pickup_time','start_location','end_location','estimated_fare','user_id','is_logged_in','status','no_passenger'];
    protected $table = 'taxi_bookings';

    public function client(){
    	return $this->belongsTo('App\User');
    }

    public function mailLogs(){
    	return $this->hasMany('App\MailLog');
    }
}
