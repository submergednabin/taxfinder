<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Driver;
use Auth;
use Validator;

class AdminDriverController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function getDriversList(){
    	$drivers = Driver::all();
    	return view('taxifare.admin.driver.index',compact('drivers'));
    }

    public function createDriverForm(){
    	return view('taxifare.admin.driver.create');
    }

    public function postDriverForm(Request $request){
    	$rules = [
    		'fullname'=>'required',
    		'username'=>'required|unique:drivers',
    		'email'=>'required|unique:drivers',
    		'image'=>'mimes:png,jpeg,jpg',
    		'phone_number'=>'required',
    		'password'=>'required|confirmed',
    		'password_confirmation'=>'required',
    	];
    	$message = [
    		'phone_number.required'=>'The phone number is required.',
    	];

    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/driver/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/DriverImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/DriverImage/'.$file->getClientOriginalName():Null;
            }
            $input['password']= bcrypt($request->password);
            $registerDriver = Driver::create($input);
            session()->flash('message','The New Driver is registered.');
            return redirect('admin/driver');
    	}
    }

    public function editDriver($id){
    	$driver = Driver::find($id);
    	return view('taxifare.admin.driver.edit',compact('driver'));
    }

    public function updateDriver(Request $request,$id){
    	$rules = [
    		'fullname'=>'required',
    		'username'=>'required',
    		'email'=>'required',
    		'image'=>'mimes:png,jpeg,jpg',
    		'phone_number'=>'required',
    	];
    	$message = [
    		'phone_number.required'=>'The phone number is required.',
    	];
    	$validate = Validator::make($request->all(),$rules,$message);
    	if($validate->fails()){
    		return redirect('admin/driver/edit/'.$id)
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/DriverImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/DriverImage/'.$file->getClientOriginalName():Null;
            }
            $findDriver = Driver::find($id);
            $updateDriver = $findDriver->update($input);
            session()->flash('message','Driver Profile Updated.');
            return redirect('admin/driver');
    	}
    }

    public function destroyDriver(Request $request,$id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$findDriver = Driver::find($id);
    	$findDriver->delete();
    	session()->flash('message','Driver Removed Successfully.');
    	return response()->json([
    		'status'=>'success',
    		'url'=>url('admin/driver'),
    	]);
    }
}
