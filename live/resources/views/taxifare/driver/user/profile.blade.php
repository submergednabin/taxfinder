@extends('taxifare.driver.main')
@section('title','Profile - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="col-sm-8 admin-profile">
		<div class="box-title admin">
			<p>Profile of {{(Auth::guard('taxiDriver')->user()->fullname)}}</p>
		</div>
		<?php
		$id = Auth::guard('taxiDriver')->user()->id;
	?>
		<table class="table table-striped admin">
			<tbody>
				<tr>
					<th>FullName</th>
					<td>{{Auth::guard('taxiDriver')->user()->fullname}}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{Auth::guard('taxiDriver')->user()->email}}</td>
				</tr>
				<tr>
					<th>Mobile</th>
					<td>{{Auth::guard('taxiDriver')->user()->phone_number}}</td>
				</tr>
				<tr>
					<th>Image</th>
					<?php
						$driverImage = \App\Driver::find($id);
						$image = $driverImage->image;
					?>
					<td>
						@if($image)
							{{Html::image($image,'',['width'=>80,'height'=>80])}}
						@else
							{{'No Image'}}
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</section>
	<section class="col-sm-4 admin-change-pass">
		<div class="box-title change">
			<p>Change Password</p>
		</div>
	
		{{Form::open(['method'=>'POST','url'=>'driver/profile/change-password/'.$id,'class'=>'form-horizontal','files'=>true])}}
			<div class="form-group">
				<div class="col-sm-12">
					<label>New Password</label>
					{{Form::password('password',['class'=>'form-control','placeholder'=>'Enter New Password'])}}
					@if ($errors->has('password'))
				        
				            <span class="help-block">
				              {{ $errors->first('password') }}
				            </span>
				    @endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<label>Confirm Password</label>
					{{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password'])}}
					@if ($errors->has('password_confirmation'))
				        
				            <span class="help-block">
				              {{ $errors->first('password_confirmation') }}
				            </span>
				    @endif
				</div>
			</div>
			<div class="form-group text-center">
				<button type="submit" class="btn btn-success">Change Password</button>
			</div>
		{{Form::close()}}
	</section>
@stop