<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Auth;
use Validator;

class ContactController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function getContactForm(){
    	$contact = Contact::first();
    	return view('taxifare.admin.contact.form',compact('contact'));
    }

    public function createUpdateForm(Request $request){
    	$contact = Contact::first();
    	$input = $request->all();
    	if(count($contact)>0){
    		$updateContact = $contact->update($input);
    		session()->flash('message','Contact Updated.');
    		return redirect('admin/contact');
    	}else{
    		$createContact = Contact::create($input);
    		session()->flash('message','contact created.');
    		return redirect('admin/contact');
    	}
    }
}
