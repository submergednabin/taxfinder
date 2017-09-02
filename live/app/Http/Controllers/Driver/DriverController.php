<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use App\MailLog;
use Auth;
use Validator;

class DriverController extends Controller
{
    public function __construct(){
        $this->middleware('driver',['except'=>['getDriverLogin','postDriverLogin','getDriverSignup']]);
        $this->middleware('driver.auth',['only'=>'getDriverLogin']);
    }
	
    public function index(){
        $drivers = Driver::all();
        return view('taxifare.driver.dashboard.index',compact('drivers'));
    }

    public function getDriverLogin(){
    	return view('taxifare.driver.login.signin')->with('title','Taxi Drivers Login');
    }

    public function postDriverLogin(Request $request){
    	if(Auth::guard('taxiDriver')->attempt([
    		'email'=>$request->email,
    		'password'=>$request->password,
    	])){
    		return redirect('driver/dashboard');
    	}
    	Auth::guard('taxiDriver')->logout();
    	return redirect('driver/login')
    		->withInput($request->only('email'))
    		->withErrors(['email'=>'Invalid Email/Password']);
    }

    public function getDriverSignup(){

    	return view('taxifare.driver.login.signup')->with('title','Register Taxi Drivers');
    }

    public function postDriverRegistration(Request $request){
    	$rules = [
    		'fullname'=>'required',
    		'email'=>'email|unique:drivers',
    		'image'=>'mimes:jpg,jpeg,png',
    		'username'=>'required|unique:drivers',
    		'password'=>'required|confirmed',
    		'password_confirmation'=>'required',
    		'phone_number'=>'required',
    	];
    	$message = [
    		'phone_number.required'=>'The phone number is required',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('driver/register')
    			->withErrors($validate)
    			->withInput(['except'=>'password']);
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/DriverImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/DriverImage/'.$file->getClientOriginalName():Null;
            }
            $input['password'] = bcrypt($request->password);
            $saveDrivers = Driver::create($input);
            session()->flash('message','The driver Login has been created.');
            return redirect('driver/login');
    	}
    }

    public function listDriver(){
        $driverId = Auth::guard('taxiDriver')->user()->id;
        $driver = Driver::find($driverId);
        return view('taxifare.driver.user.index',compact('driver','driverId'));

    }

    public function editDriver($id){
        $driver = Driver::find($id);
        return view('taxifare.driver.user.edit',compact('driver'));
    }

    public function updateDriver(Request $request,$id){
        $rules = [
            'fullname'=>'required',
            'email'=>'required',
            'username'=>'required',
            'image'=>'mimes:jpg,jpeg,png',
            'phone_number'=>'required',
        ];

        $message = [
            'phone_number'=>'The phone number is required.',
        ];
        $validate = Validator::make($request->all(),$rules,$message);
        if($validate->fails()){
            return redirect('driver/user/edit/'.$id)
                ->withErrors($validate)
                ->withInput();
        }else{
            $driver = Driver::find($id);
            $input = $request->all();
            if($request->hasFile('image')){
                $destinationPath = "images/DriverImage/";
                $file = $request->file('image');
                $file->move($destinationPath,$file->getClientOriginalName());
                $input['image'] = $request->image?'images/DriverImage/'.$file->getClientOriginalName():Null;
            }
            $updateDriver = $driver->update($input);
            session()->flash('message','The driver profile is updated.');
            return redirect('driver/user');
        }
    }

    public function listAllMail(){

        $mails = MailLog::orderBy('updated_at','DESC')->get();
        return view('taxifare.driver.mail.index',compact('mails'));

    }

    public function updateMailStatusForDriverMail(Request $request,$id){
        if(!$request->ajax()){
            return false;
        }
        $findStatus = MailLog::find($id);
        $status = $findStatus->status;
        /*$input = $request->all();
        $input['status']=$request->status;*/
        if($status==1){
            $changeStatus = 0;
        }else{
            $changeStatus = 1;
        }
        $findStatus->update([
            'status'=>$changeStatus,
        ]);
        session()->flash('message','The mail is marked as read.');
        return response()->json([
            'status'=>'success',
            'url'=>url('driver/mail/inbox'),
        ]);
    }

    public function driverLogout(){
        Auth::guard('taxiDriver')->logout();
        return redirect('driver/login');
    }

     public function driverProfile(){
        return view('taxifare.driver.user.profile');
    }

    public function updatePassword(Request $request){
        $id = Auth::guard('taxiDriver')->user()->id;
        $rules = [
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ];
        $message = [
            'password_confirmation.required'=>'The confirmation password is required',
            'password.confirmed'=>'The password and the password confirmation should match.',
        ];

        $validate = Validator::make($request->all(),$rules,$message);
        if($validate->fails()){
            return redirect('driver/profile')
                ->withErrors($validate)
                ->withInput();
        }else{
            $findDriver = Driver::find($id);
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
            $updatePassword = $findDriver->update($input);
            session()->flash('message','password changed successfully.please Login to continue.');
            /*Auth::guard('admin')->logout();
            return redirect('admin');*/
            return redirect('driver/logout');
        }
    }
}
