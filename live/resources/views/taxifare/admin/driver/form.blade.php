<div class="form-group">
	<label class="col-sm-2">Fullname<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
		@if(!Request::segment(4)=='edit')
			{{Form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter Your Fullname'])}}
		@else
			{{Form::text('fullname',$driver->fullname,['class'=>'form-control','placeholder'=>'Enter Your Fullname'])}}	
		@endif
		@if ($errors->has('fullname'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('fullname') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Username<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
		@if(!Request::segment(4)=='edit')
			{{Form::text('username',null,['class'=>'form-control','placeholder'=>'Enter Your username'])}}
		@else
			{{Form::text('username',$driver->username,['class'=>'form-control','placeholder'=>'Enter Your username'])}}	
		@endif
		@if ($errors->has('username'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('username') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Email<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
		@if(!Request::segment(4)=='edit')
			{{Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Your email'])}}
		@else
			{{Form::email('email',$driver->email,['class'=>'form-control','placeholder'=>'Enter Your email'])}}	
		@endif
		@if ($errors->has('email'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('email') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Contact No.<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
		@if(!Request::segment(4)=='edit')
			{{Form::text('phone_number',null,['class'=>'form-control','placeholder'=>'Enter Your Phone Number'])}}
		@else
			{{Form::text('phone_number',$driver->phone_number,['class'=>'form-control','placeholder'=>'Enter Your Phone Number'])}}	
		@endif
		@if ($errors->has('phone_number'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('phone_number') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Profile Photo</label>
	<div class="col-sm-6">
		@if(!Request::segment(4)=='edit')
			{{Form::file('image',['class'=>'form-control'])}}
		@else
			{{Form::file('image',['class'=>'form-control'])}}
		@endif
		@if ($errors->has('image'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('image') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
		@if(!Request::segment(4)=='edit')
<div class="form-group">
	<label class="col-sm-2">Set Password<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
			{{Form::password('password',['class'=>'form-control','placeholder'=>'Choose Password'])}}
		@if ($errors->has('password'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('password') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Confirm Password<span style="color: red">&nbsp;*</span></label>
	<div class="col-sm-6">
			{{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password.'])}}
		@if ($errors->has('password_confirmation'))
	    <div class="col-md-12 col-md-offset-3">
	        <span class="help-block">
	          {{ $errors->first('password_confirmation') }}
	        </span>
	    </div>
		@endif
	</div>
</div>
		@endif
<div class="form-group">
	<div class="col-sm-8 text-right">
	@if(!Request::segment(4)=='edit')
		<button type="submit" class="btn btn-primary ">Register Driver</button>
	@else
		<button type="submit" class="btn btn-primary ">Update</button>
	@endif
	</div>
</div>