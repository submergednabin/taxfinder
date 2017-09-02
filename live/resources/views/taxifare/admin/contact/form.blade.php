@extends('taxifare.admin.main')
@section('title','Contact Detail - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Contact Form</h1>
	</section>
	<!-- Main content -->
	<section class="content">
	    <div class="row">
	        <div class="col-xs-12">
	            @include('taxifare.flash.message')
	            <div class="box">
	                <div class="box-body">
	                	{{Form::open(['method'=>'POST','url'=>'admin/contact/post-contact','class'=>'form-horizontal','files'=>true])}}
	                	@if(count($contact)>0)
	                		<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Company Name</label>
	                				{{Form::text('company_name',$contact->company_name,['class'=>'form-control','placeholder'=>'Enter Company Name Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Phone Number</label>
	                				{{Form::text('phone_number',$contact->phone_number,['class'=>'form-control','placeholder'=>'Enter Phone Number Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Email</label>
	                				{{Form::email('email',$contact->email,['class'=>'form-control','placeholder'=>'Enter Email Here.'])}}
	                			</div>
	                		</div>
	                		<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Country</label>
	                				{{Form::text('country',$contact->country,['class'=>'form-control','placeholder'=>'Enter Country Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>State</label>
	                				{{Form::text('state',$contact->state,['class'=>'form-control','placeholder'=>'Enter State Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>City</label>
	                				{{Form::text('city',$contact->city,['class'=>'form-control','placeholder'=>'Enter City Here.'])}}
	                			</div>
	                			
	                		</div>
	                		<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Suburb</label>
	                				{{Form::text('suburb',$contact->suburb,['class'=>'form-control','placeholder'=>'Enter Suburb Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Postal Code</label>
	                				{{Form::text('postal_code',$contact->postal_code,['class'=>'form-control','placeholder'=>'Enter Postal Code Here.'])}}
	                			</div>
	                			
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Facebook Link</label>
	                			<div class="col-sm-6">
	                				{{Form::text('fb_link',$contact->fb_link,['class'=>'form-control','placeholder'=>'Enter Facebook Link Here.'])}}
	                			</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Twitter Link</label>
		                		<div class="col-sm-6">
	                				{{Form::text('twitter_link',$contact->twitter_link,['class'=>'form-control','placeholder'=>'Enter Twitter Link Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Skype ID</label>
		                		<div class="col-sm-6">
	                				{{Form::text('skype_id',$contact->skype_id,['class'=>'form-control','placeholder'=>'Enter Skype Id Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">LinkedIn Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('linkedin_address',$contact->linkedin_address,['class'=>'form-control','placeholder'=>'Enter LinkedIn Address Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Instagram Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('instagram_address',$contact->instagram_address,['class'=>'form-control','placeholder'=>'Enter Instagram Address Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Pinterest Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('pinterest_address',$contact->pinterest_address,['class'=>'form-control','placeholder'=>'Enter Pinterest Address Here.'])}}
		                		</div>
	                		</div>
	                	@else
	                	<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Company Name</label>
	                				{{Form::text('company_name',null,['class'=>'form-control','placeholder'=>'Enter Company Name Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Phone Number</label>
	                				{{Form::text('phone_number',null,['class'=>'form-control','placeholder'=>'Enter Phone Number Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Email</label>
	                				{{Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email Here.'])}}
	                			</div>
	                		</div>
	                		<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Country</label>
	                				{{Form::text('country',null,['class'=>'form-control','placeholder'=>'Enter Country Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>State</label>
	                				{{Form::text('state',null,['class'=>'form-control','placeholder'=>'Enter State Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>City</label>
	                				{{Form::text('city',null,['class'=>'form-control','placeholder'=>'Enter City Here.'])}}
	                			</div>
	                			
	                		</div>
	                		<div class="form-group">
	                			<div class="col-sm-4">
	                				<label>Suburb</label>
	                				{{Form::text('suburb',null,['class'=>'form-control','placeholder'=>'Enter Suburb Here.'])}}
	                			</div>
	                			<div class="col-sm-4">
	                				<label>Postal Code</label>
	                				{{Form::text('postal_code',null,['class'=>'form-control','placeholder'=>'Enter Postal Code Here.'])}}
	                			</div>
	                			
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Facebook Link</label>
	                			<div class="col-sm-6">
	                				{{Form::text('fb_link',null,['class'=>'form-control','placeholder'=>'Enter Facebook Link Here.'])}}
	                			</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Twitter Link</label>
		                		<div class="col-sm-6">
	                				{{Form::text('suburb',null,['class'=>'form-control','placeholder'=>'Enter Twitter Link Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Skype ID</label>
		                		<div class="col-sm-6">
	                				{{Form::text('suburb',null,['class'=>'form-control','placeholder'=>'Enter Skype Id Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">LinkedIn Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('linkedin_address',null,['class'=>'form-control','placeholder'=>'Enter LinkedIn Address Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Instagram Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('instagram_address',null,['class'=>'form-control','placeholder'=>'Enter Instagram Address Here.'])}}
		                		</div>
	                		</div>
	                		<div class="form-group">
	                			<label class="col-sm-2">Pinterest Address</label>
		                		<div class="col-sm-6">
	                				{{Form::text('pinterest_address',null,['class'=>'form-control','placeholder'=>'Enter Pinterest Address Here.'])}}
		                		</div>
	                		</div>
	                	@endif
	                		<div class="form-group">
	                			<div class="col-sm-12 text-right">
	                				<button type="submit" class="btn btn-primary">Save</button>
	                			</div>
	                		</div>
	                	{{Form::close()}}
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
@stop
