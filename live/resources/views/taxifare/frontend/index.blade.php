@extends('taxifare.frontend.frontlayout')
@section('title','Home')
@section('content')
<div class="col-md-6">
		<div class="logo"><a href="{{url('/home')}}"><img src="img/taxi-logo.png"></a></div>
		</div>
		<div class="col-md-6">
		<?php
		$contact = \App\Contact::first();
		?>
		<div class="phone">
			<!-- <a href="tel:{{$contact->phone_number}}">{{$contact->phone_number}}</a> -->
		</div>
		</div>
		<div class="col-sm-12 home-login">
			@if(Auth::check())
				<div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Login
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="{{url('client/logout')}}">Logout</a></li>
				  </ul>
				</div>
			@else
				<a href="{{url('client/login')}}" class="btn btn-primary">Login</a>
			@endif
		</div>
		<div class="fare-calculation">
		<h1>Get your taxi fare now</h1>
		</div>
		<center>
		@include('taxifare.flash.message')
		 <div>
		 @if($errors->first('message'))
			 	<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <p>{{ $errors->first('message') }}</p>
				</div>
		@endif
        </div>
    	{{Form::open(['method'=>'GET','url'=>'taxi-fare','class'=>'form-horizontal','files'=>true])}}
		<div role='form'>
			<div class="form-group">
				<div class="col-sm-2">
					<label>From</label>
				</div>
				<div class="col-sm-10">
					{{Form::text('start_location',null,['class'=>'form-control controls','id'=>'origin-input','placeholder'=>'Where to start?'])}}
					@if ($errors->has('start_location'))
		                <div>
		                <span class="help-block">
		                  {{ $errors->first('start_location') }}
		                </span>
		                </div>
		            @endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
					<label>To</label>
				</div>
				<div class="col-sm-10">
					{{Form::text('end_location',null,['class'=>'form-control controls','id'=>'destination-input','placeholder'=>'Where to go?'])}}
					@if ($errors->has('end_location'))
		                <div>
		                <span class="help-block">
		                  {{ $errors->first('end_location') }}
		                </span>
		                </div>
		            @endif
				</div>
			</div>

			<!-- <div id="map"></div> -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<button type="submit" class="btn-normal btn-color submit bottom-pad">Estimate Fare</button>
			
		</div>
	{{Form::close()}}
  </center>
  <script type="text/javascript">
  	var autocomplete;
        function initMap() {
        var options = {
		    types: ['geocode'],  // or '(cities)' if that's what you want?
		    componentRestrictions: {country: "us"}
		};
          originAutocomplete = new google.maps.places.Autocomplete(
             (document.getElementById('origin-input')),
             options);
          destinationAutocomplete = new google.maps.places.Autocomplete(
             (document.getElementById('destination-input')), options);
          google.maps.event.addListener(originAutocomplete, 'place_changed', function() {
          });
          google.maps.event.addListener(destinationAutocomplete, 'place_changed', function() {
          });
    }

</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARXlBlLHROdt2kT7QXrlMv-CJWk9rA7Ow&libraries=places&callback=initMap" async defer></script>
@stop
