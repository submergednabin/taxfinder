<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaxiFare;
use Auth;
use Validator;

class FareController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function getTaxiFare(){
    	$taxiFare = TaxiFare::first();
    	return view('taxifare.admin.fare.form',compact('taxiFare'));
    }

    public function postTaxiFare(Request $request){
    	$taxiFare = TaxiFare::first();
    	$rules = [
    		'taxi_initial_fare'=>'required',
    	];
    	$message = [
    		'taxi_initial_fare.required'=>'The initial taxi fare is required.',
    	];

    	$validate = Validator::make($request->all(),$rules,$message);
    	$input = $request->all();
    	if(count($taxiFare)>0){
    		if($validate->fails()){
    			return redirect('admin/taxi-fare')
    				->withErrors($validate)
    				->withInput();
    		}else{
	    		$updateFare = $taxiFare->update($input);
	    		session()->flash('message','Taxi Fare Updated.');
	    		return redirect('admin/taxi-fare');
    		}
    	}else{
    		if($validate->fails()){
    			return redirect('admin/taxi-fare')
    				->withErrors($validate)
    				->withInput();
    		}else{
	    		$createTaxiFare = TaxiFare::create($input);
    			session()->flash('message','Taxi Fare created.');
    			return redirect('admin/taxi-fare');
    		}
    	}
    }
}
