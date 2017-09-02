@extends('taxifare.admin.main')
@section('title','Taxi Initial Fare - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Taxi Fare Per Mile</h1>
	</section>
	<!-- Main content -->
	<section class="content">
	    <div class="row">
	        <div class="col-xs-12">
	            @include('taxifare.flash.message')
	            <div class="box">
	                <div class="box-body">
	                	{{Form::open(['method'=>'POST','url'=>'admin/taxi-fare/post-fare','class'=>'form-horizontal','files'=>true])}}
	                	@if(count($taxiFare)>0)
	                		<div class="form-group">
                				<label class="col-sm-2">Taxi Initial Fare<span style="color:red">*</span></label>
	                			<div class="col-sm-6">
	                				{{Form::text('taxi_initial_fare',$taxiFare->taxi_initial_fare,['class'=>'form-control','placeholder'=>'Enter Taxi Initial Fare Here.'])}}
	                				@if ($errors->has('taxi_initial_fare'))
							        <div class="col-md-12 col-md-offset-3">
							            <span class="help-block">
							              {{ $errors->first('taxi_initial_fare') }}
							            </span>
							        </div>
							    	@endif
								</div>
	                		</div>
	                		<div class="form-group">
                				<label class="col-sm-2">Tax (%)</label>
	                			<div class="col-sm-6">
	                				{{Form::text('tax',$taxiFare->tax,['class'=>'form-control','placeholder'=>'Enter Company Name Here.'])}}
	                			</div>
	                		</div>
	                	@else
	                	<div class="form-group">
	                		<div class="form-group">
                				<label class="col-sm-2">Taxi Initial Fare<span style="color:red">*</span></label>
	                			<div class="col-sm-6">
	                				{{Form::text('taxi_initial_fare',null,['class'=>'form-control','placeholder'=>'Enter Taxi Initial Fare Here.'])}}
	                				@if ($errors->has('taxi_initial_fare'))
							        <div class="col-md-12 col-md-offset-3">
							            <span class="help-block">
							              {{ $errors->first('taxi_initial_fare') }}
							            </span>
							        </div>
							    	@endif
	                			</div>
	                		</div>
	                		<div class="form-group">
                				<label class="col-sm-2">Tax (%)</label>
	                			<div class="col-sm-6">
	                				{{Form::text('tax',null,['class'=>'form-control','placeholder'=>'Enter Company Name Here.'])}}
	                			</div>
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
