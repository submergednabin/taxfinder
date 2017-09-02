<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Session;
use App\TAXIBOOKING;
use App\Client;
use Carbon\Carbon;


class FrontendController extends Controller
{
    public function __construct(){
        // $this->middleware('auth',['only'=>'postTaxiBooking']);
        // $this->middleware('guest',['only'=>'postTaxiBooking']);
    }
    public function getFrontview(){
    	return view('taxifare.frontend.index');
    }

    public function fareCalculation(Request $request){
    	$rules = [
    		'start_location'=>'required',
    		'end_location'=>'required',
    	];
    	$validation = Validator::make($request->all(),$rules);
    	if($validation->fails()){
    		return redirect('/home')->withInput()->withErrors($validation);
    	}else{

        	$origin = urlencode($request->start_location);
        	$destination = urlencode($request->end_location);
    		$data = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$origin.'&destinations='.$destination.'&key=AIzaSyARXlBlLHROdt2kT7QXrlMv-CJWk9rA7Ow');
    		$json = json_decode($data, true);
            $distanceCalculated = $json['rows'][0]['elements'][0]['distance']['text'];
        	$durationCalculated = $json['rows'][0]['elements'][0]['duration']['text'];
            $start = $request->start_location;
            $end = $request->end_location;
            return view('taxifare.frontend.fareCalculate',compact('distanceCalculated','durationCalculated','origin','destination','start','end'));
    	}

    }

    public function taxiBooking(Request $request){
        $pickupLocation = $request->start?$request->start:(session()->has('pickupLocation')?session('pickupLocation'):'');
        $dropLocation = $request->end?$request->end:(session()->has('dropLocation')?session('dropLocation'):'');
        $estimatedPrice = $request->totalPrice?$request->totalPrice:(session()->has('estimatedPrice')?session('estimatedPrice'):'');
        if(($pickupLocation&&$dropLocation&&$estimatedPrice)){
            return view('taxifare.frontend.booking-form',compact('pickupLocation','dropLocation','estimatedPrice'));
        }
        else{
            return redirect('home')->withErrors(['message'=>'please check the estimated price first at home page.']);
        }
        }

    public function postTaxiBooking(Request $request){
        $rules = [
            'no_passenger'=>'required',
            'pickup_date'=>'required',
            'pickup_time'=>'required',
        ];
        $input = $request->all();
        $total = $request->start_location.'&'.$request->end_location.'&'.$request->estimated_fare;
         $validate = Validator::make($request->all(),$rules);
            if($validate->fails()){
                /*return redirect('taxi-booking'.'?'.'start='.$request->start_location.'&'.'end='.'&'.$request->end_location.'&'.'totalPrice='.$request->estimated_fare)
                    ->withErrors($validate)
                    ->withInput();*/
                return redirect()->back()->withErrors($validate)->withInput();
            }else{
                if(Auth::check()){
                    $input['user_id'] = Auth::user()->id;
                    $input['is_logged_in'] = Auth::user()->id ? 'Y' : 'N';
                    $saveBooking = TAXIBOOKING::create($input);
                    session()->flash('message','The taxi has been booked.');
                    return redirect('/home');
                }else{
                        session()->flash('no_passenger',$request->no_passenger);
                        session()->flash('pickup_date',$request->pickup_date);
                        session()->flash('pickup_time',$request->pickup_time);
                        session()->flash('start_location',$request->start_location);
                        session()->flash('end_location',$request->end_location);
                        session()->flash('estimated_fare',$request->estimated_fare);
                        return redirect('client/login');
                }
                
                
            }
        

    }

}
