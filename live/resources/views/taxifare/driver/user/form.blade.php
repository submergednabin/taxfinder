<div class="form-group">
  <label class="control-label col-sm-3">Fullname <span class="text-danger">*</span></label>
  <div class="col-md-8 col-sm-9">
  	{{Form::text('fullname',$driver->fullname,['class'=>'form-control','placeholder'=>'Enter your FullName'])}}
  	@if ($errors->has('fullname'))
      <div>
      <span class="help-block">
        {{ $errors->first('fullname') }}
      </span>
      </div>
  @endif
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-3">Username <span class="text-danger">*</span></label>
  <div class="col-md-8 col-sm-9">
  	{{Form::text('username',$driver->username,['class'=>'form-control','placeholder'=>'Enter your Username'])}}
  	@if ($errors->has('username'))
      <div>
      <span class="help-block">
        {{ $errors->first('username') }}
      </span>
      </div>
  @endif
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-3">Email<span class="text-danger">*</span></label>
  <div class="col-md-8 col-sm-9">
      <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      {{Form::email('email',$driver->email,['class'=>'form-control','placeholder'=>'Enter your email ID'])}}
      @if ($errors->has('email'))
      <div>
      <span class="help-block">
        {{ $errors->first('email') }}
      </span>
      </div>
  @endif
    </div>
   </div>
</div>       
<div class="form-group">
  <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
  <div class="col-md-5 col-sm-8">
  	<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
      {{Form::text('phone_number',$driver->phone_number,['class'=>'form-control','placehoder'=>'Enter your Contact No.'])}}
      @if($errors->has('phone_number'))
      <div>
      <span class="help-block">
        {{ $errors->first('phone_number') }}
      </span>
      </div>
  	  @endif
    </div>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-3">Profile Photo <br>
  <small>(optional)</small></label>
  <div class="col-md-5 col-sm-8">
    <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
    	{{Form::file('image',['class'=>'form-control'])}}
    	@if ($errors->has('image'))
      <div>
      <span class="help-block">
        {{ $errors->first('image') }}
      </span>
      </div>
  	@endif
    </div>
  </div>
</div>
<div class="form-group">
  <div class="col-xs-offset-3 col-xs-10">
  	<button type="submit" class="btn btn-primary">Update</button>
  </div>
</div>