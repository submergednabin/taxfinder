<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Validator;
use Session;

class ClientController extends Controller
{
	public function __construct(){
		$this->middleware('client.guest',['only'=>'getClientLogin']);
	}
	public function index(){

	}
	public function getClientLogin(){
		return view('taxifare.client.clientLogin.login')->with('title','Client Login');
	}

	public function registerClientLogin(){
		return view('taxifare.client.clientLogin.signup')->with('title','Register Client');
	}

	public function postClientRegistration(Request $request){
		$rules = [
			'first_name'=>'required',
			'last_name'=>'required',
			'username'=>'required|unique:users',
			'email'=>'required|unique:users',
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',
			'mobile'=>'required',
		];
		$validation = Validator::make($request->all(),$rules);
		$input = $request->all();
		if($validation->fails()){
			return redirect('client/register')
				->withErrors($validation)
				->withInput(['except'=>'password']);
		}else{

			if($request->hasFile('image')){
	            $destinationPath = "images/clientsImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/clientsImage/'.$file->getClientOriginalName():Null;
            }
            $input['Mobile'] = $request->mobile;
            $input['password'] = bcrypt($request->password);
            $clientSave = User::create($input);
            session()->flash('message','The Client has been added successfully.');
            return redirect('client/login')->with('title','Client Login');
		}
	}

	public function postClientLogin(Request $request){
		if(Auth::attempt([
			'email'=>$request->email,
			'password'=>$request->password,
		])){
			$no_passenger =  $request->no_passenger;
            $pickup_date  =  $request->pickup_date;
            $pickup_time  =  $request->pickup_time;
            $start_location= $request->start_location;
            $end_location =	 $request->end_location;
            $estimated_fare= $request->estimated_fare;
            $pickupLocation = $start_location;
        	$dropLocation = $end_location;
        	$estimatedPrice = $estimated_fare;
			if($start_location && $end_location){
				session()->flash('pickupLocation',$pickupLocation);
				session()->flash('dropLocation',$dropLocation);
				session()->flash('estimatedPrice',$estimatedPrice);
				return redirect('taxi-booking');
				/*->route('taxi.booking',['start'=>urlencode($start_location),'end'=>urlencode($end_location),'estimated_fare'=>urlencode($estimated_fare)]);*/
				
				// $url = url('taxi-booking'.'?'.'start='.$start_location.'&'.'end='.'&'.$end_location.'&'.'totalPrice='.$estimated_fare);
				// return redirect($url);
			}else{

				return redirect('/home');
			}
		}
		Auth::logout();
		return redirect('client/login')
			->withInput($request->only('email'))
			->withErrors(['email'=>'Invalid email/password']);
	}

	public function clientLogout(){
		Auth::logout();
        Session::flush();
        return redirect('/home');
	}
}
