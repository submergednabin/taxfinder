<div class="form-group">
	<label class="col-sm-2">First Name<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
	@if(!Request::segment(4)=='edit')
		{{Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Enter Your First Name Here', 'required'=>'required'])}}
	@else
		{{Form::text('first_name',$find->first_name,['class'=>'form-control','placeholder'=>'Enter Your First Name Here', 'required'=>'required'])}}
	@endif
		@if ($errors->has('first_name'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('first_name') }}
            </span>
        </div>
        @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Last Name<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
	@if(!Request::segment(4)=='edit')
		{{Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Enter Your Last Name Here', 'required'=>'required'])}}
	@else
		{{Form::text('last_name',$find->last_name,['class'=>'form-control','placeholder'=>'Enter Your Last Name Here', 'required'=>'required'])}}
	@endif
		@if ($errors->has('last_name'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('last_name') }}
            </span>
        </div>
    @endif
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">UserName<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
	@if(!Request::segment(4)=='edit')
		{{Form::text('username',null,['class'=>'form-control','placeholder'=>'Enter Your User Name Here', 'required'=>'required'])}}
	@else
		{{Form::text('username',$find->username,['class'=>'form-control','placeholder'=>'Enter Your User Name Here', 'required'=>'required'])}}
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
	<label class="col-sm-2">Email<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
	@if(!Request::segment(4)=='edit')
		{{Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Your Email Here', 'required'=>'required'])}}
	@else
		{{Form::email('email',$find->email,['class'=>'form-control','placeholder'=>'Enter Your Email Here', 'required'=>'required'])}}
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
@if(!Request::segment(4)=='edit')
<div class="form-group">
	<label class="col-sm-2">Password<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">

		{{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Your Password Here', 'required'=>'required'])}}
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
	<label class="col-sm-2">Confirm Password<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
		{{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm your password Here', 'required'=>'required'])}}
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
	<label class="col-sm-2">Mobile<span style="color: red;">&nbsp;*</span></label>
	<div class="col-sm-6">
	@if(!Request::segment(4)=='edit')
		{{Form::text('mobile',null,['class'=>'form-control','placeholder'=>'Enter Your Mobile Number Here', 'required'=>'required'])}}
	@else
		{{Form::text('mobile',$find->mobile,['class'=>'form-control','placeholder'=>'Enter Your Mobile Number Here', 'required'=>'required'])}}
	
	@endif
		@if($errors->has('mobile'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('mobile') }}
            </span>
        </div>
    @endif
	</div>
</div>
<div class="form-group">
        <label for="image" class="col-sm-3 control-label">Image</label>

        <div class="col-sm-6">
            <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                   name="image" type="file" placeholder="">
            Upload Image
            @if($errors->has('image'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('image') }}
            </span>
        </div>
    @endif
        </div>

        @if(!Request::segment('4') == 'edit')
            <div class="col-md-12 col-md-offset-3">
                <img width="150px" id="image"/>
            </div>
        @else
            <div class="col-md-12 col-md-offset-3">
                {{ Html::image($find->image,'',['width'=>'100px','id'=>'image', 'class'=>'table-team-img']) }}
            </div>
        @endif
        
    </div>
<div class="form-group">
	<div class="col-sm-8">
		@if(!Request::segment(4)=='edit')
		<button type="submit" class="btn btn-primary">Save</button>
		@else
		<button type="submit" class="btn btn-primary">Update</button>
		@endif
	</div>
</div>