<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxiFare extends Model
{
    protected $fillable = ['status','taxi_initial_fare','tax'];
    protected $table = 'taxi_fares';
}
