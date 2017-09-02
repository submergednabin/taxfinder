<div class="form-group">
	<label class="col-sm-2">First Name<span style="color:red;">&nbsp *</span></label>
	<div class="col-sm-6">
	{{Form::text('first_name',$client->first_name,['class'=>'form-control'])}}
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
	<label class="col-sm-2">Middle Name<span style="color:red;">&nbsp *</span></label>
	<div class="col-sm-6">
	{{Form::text('middle_name',$client->middle_name,['class'=>'form-control'])}}
	@if ($errors->has('middle_name'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('middle_name') }}
            </span>
        </div>
    @endif
		
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Last Name<span style="color:red;">&nbsp *</span></label>
	<div class="col-sm-6">
	{{Form::text('last_name',$client->last_name,['class'=>'form-control'])}}
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
	<label class="col-sm-2">Email<span style="color:red;">&nbsp *</span></label>
	<div class="col-sm-6">
	{{ Form::email('email',$client->email, ['class' => 'form-control']) }}
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
	<label class="col-sm-2">Mobile<span style="color:red;">&nbsp *</span></label>
	<div class="col-sm-6">
	{{Form::text('mobile',$client->Mobile,['class'=>'form-control'])}}
	@if ($errors->has('mobile'))
        <div class="col-md-12 col-md-offset-3">
            <span class="help-block">
              {{ $errors->first('mobile') }}
            </span>
        </div>
    @endif
		
	</div>
</div>

<div class="form-group">
        <label for="image" class="col-sm-3 control-label">Image<span class=help-block" style="color: #b30000">&nbsp;* </span></label>

        <div class="col-sm-6">
            <input onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                   name="image" type="file" placeholder="">
            Upload Image
        </div>

        @if(!Request::segment('4') == 'edit')
            <div class="col-md-12 col-md-offset-3">
                <img width="150px" id="image"/>
            </div>
        @else
            <div class="col-md-12 col-md-offset-3">
                {{ Html::image($client->image,'',['width'=>'100px','id'=>'image', 'class'=>'table-team-img']) }}
            </div>
        @endif

        @if ($errors->has('image'))
            <div class="col-md-12 col-md-offset-3">
                <span class="help-block">
                  {{ $errors->first('image') }}
                </span>
            </div>
        @endif
    </div>
    <div class="form-group col-sm-8 text-right">
    	<button type="submit" class="btn btn-primary ">Update</button>
    </div>
