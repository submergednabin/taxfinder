<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    protected $fillable = ['sender_address','receiver_address','booking_id','messages','subject','status'];

    public function taxiBookings(){
    	return $this->belongsTo('App\TaxiBooking');
    }
}
