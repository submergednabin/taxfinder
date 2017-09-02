<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	 {{Html::style('bootstrap/css/bootstrap.min.css')}}
    {{Html::style('font-awesome/font-awesome.min.css')}}
    {{Html::style('frontend/css/custom-style.css')}}
</head>
<body>

	<div class="container">
		<div class="rows">
			<div class="col-md-8">
		@include('taxifare.flash.message')
      <section>      
        <h1 class="text-center entry-title"><span>Sign Up Drivers</span> </h1>
        <hr>
        {{Form::open(['method'=>'POST','url'=>'driver/post-driver','class'=>'form-horizontal','files'=>true])}}
        <div class="form-group">
          <label class="control-label col-sm-3">Fullname <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
          	{{Form::text('fullname',null,['class'=>'form-control','placeholder'=>'Enter your FullName'])}}
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
          	{{Form::text('username',null,['class'=>'form-control','placeholder'=>'Enter your Username'])}}
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
              {{Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter your email ID'])}}
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
              {{Form::text('phone_number',null,['class'=>'form-control','placehoder'=>'Enter your Contact No.'])}}
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
          <label class="control-label col-sm-3">Set Password <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              {{Form::password('password',['class'=>'form-control','placeholder'=>'Choose password'])}}
              @if ($errors->has('password'))
	            <div>
	            <span class="help-block">
	              {{ $errors->first('password') }}
	            </span>
	            </div>
	        @endif
           </div>   
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              {{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password'])}}
              @if ($errors->has('password_confirmation'))
	            <div>
	            <span class="help-block">
	              {{ $errors->first('password_confirmation') }}
	            </span>
	            </div>
	        @endif
            </div>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-offset-3 col-xs-10">
          	<button type="submit" class="btn btn-primary">Sign Up</button>
          </div>
        </div>
		{{Form::close()}}
      </section>
    </div>
		</div>
	</div>
</body>
{{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}
{{ Html::script('bootstrap/js/bootstrap.min.js') }}
</html>