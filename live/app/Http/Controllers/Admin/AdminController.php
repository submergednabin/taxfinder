<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use Auth;
use Validator;

class AdminController extends Controller
{
     public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$admins = Admin::all();
    	return view('taxifare.admin.user.index',compact('admins'));
    }

    public function createAdmin(){
    	return view('taxifare.admin.user.create');
    }

    public function storeAdmin(Request $request){
    	$rules = [
    		'first_name'=>'required',
    		'last_name'=>'required',
    		'email'=>'required',
    		'username'=>'required',
    		'mobile.required'=>'Mobile number is required',
    		'image'=>'mimes:jpeg,jpg,png',
    		'password'=>'required|confirmed',
    		'password_confirmation'=>'required',
    	];

    	$validate = Validator::make($request->all(),$rules);
    	if($validate->fails()){
    		return redirect('admin/user/create')
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/AdminImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/AdminImage/'.$file->getClientOriginalName():Null;
            }
            $input['password'] = bcrypt($request->password);
            $saveAdmin = Admin::create($input);
            session()->flash('message','The New User is created successfully.');
            return redirect('admin/user');
    	}

    }

    public function editAdmin($id){
    	$find = Admin::find($id);
    	return view('taxifare.admin.user.edit',compact('find'));
    }

    public function updateAdmin(Request $request,$id){
    	$findAdmin = Admin::find($id);
    	$rules = [
    		'first_name'=>'required',
    		'last_name'=>'required',
    		'email'=>'required',
    		'username'=>'required',
    		'Mobile.required'=>'Mobile number is required',
    		'image'=>'mimes:jpeg,jpg,png',
    	];
    	$validate = Validator::make($request->all(),$rules);
    	if($validate->fails()){
    		return redirect('admin/user/edit'.$id)
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/AdminImage/";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image?'images/AdminImage/'.$file->getClientOriginalName():Null;
            }
            $updateAdmin = $findAdmin->update($input);
            session()->flash('message','The user has been updated successfully.');
            return redirect('admin/user');
    	}
    }

    public function destroyAdmin(Request $request, $id){
    	if(!$request->ajax()){
    		return false;
    	}
    	$findAdmin = Admin::find($id);
    	$findAdmin->delete();
    	session()->flash('message','Admin credentials deleted successfully');
    	return response()->json([
    		'status'=>'success',
    		'url'=>'admin/user',
    	]);
    }

    public function adminProfile(){
        return view('taxifare.admin.user.profile');
    }

    public function updatePassword(Request $request){
        $id = Auth::guard('admin')->user()->id;
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
            return redirect('admin/profile')
                ->withErrors($validate)
                ->withInput();
        }else{
            $findAdmin = Admin::find($id);
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
            $updatePassword = $findAdmin->update($input);
            session()->flash('message','password changed successfully.please Login to continue.');
            /*Auth::guard('admin')->logout();
            return redirect('admin');*/
            return redirect('admin/logout');
        }
    }
}
