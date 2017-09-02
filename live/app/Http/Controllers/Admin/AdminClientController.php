<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use session;
use App\User;
use App\Admin;
use App\TaxiBooking;
use App\MailLog;
use Validator;

class AdminClientController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }
    public function index(){

    }

    public function getAllClientList(){
    	$allClient = User::all();
    	return view('taxifare.admin.client.index',compact('allClient'));
    }

    public function editClientInfo($id){
    	$client = User::find($id);
    	$clientInfo = TaxiBooking::where('user_id',$id)->first();
    	return view('taxifare.admin.client.edit',compact('client','clientInfo'));
    }

    public function updateClientDetails(Request $request,$id){
    	$client = User::find($id);
    	$rules = [
    		'first_name'=>'required',
    		'last_name'=>'required',
    		'middle_name'=>'required',
    		'email'=>'required',
    		'image'=>'mimes:png,jpg,jpeg',
    	];
    	$validate = Validator::make($request->all(),$rules);
    	if($validate->fails()){
    		return redirect('admin/client/edit/'.$id)
    			->withErrors($validate)
    			->withInput();
    	}else{
    		$input = $request->all();
    		if($request->hasFile('image')){
	            $destinationPath = "images/clientsImage";
	            $file = $request->file('image');
	            $file->move($destinationPath,$file->getClientOriginalName());
	            $input['image'] = $request->image? 'images/clientsImage/'.$file->getClientOriginalName():Null;
            }
            $input['Mobile']=$request->mobile;
        	$updateClient = $client->update($input);
        	session()->flash('message','The Client Details has been updated.');
        	return redirect('admin/client');

    	}
    }

    public function deleteClient(Request $request,$id){
    	if(!request()->ajax()){
    		return false;
    	}
    	$client = User::find($id);
    	$client->delete();
    	session()->flash('message','Deleted successfully.');
    	return response()->json(array(
            'status' => 'success',
            'url'    => url('admin/client')
        ));
    }
}
