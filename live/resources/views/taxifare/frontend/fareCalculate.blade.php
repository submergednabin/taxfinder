<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fare Calculation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="frontend/img/favicon/favicon-144x144.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="frontend/img/favicon/favicon-72x72.html">
	<link rel="apple-touch-icon-precomposed" href="frontend/img/favicon/favicon-54x54.html">
	{{Html::style('bootstrap/css/bootstrap.min.css')}}
	{{--{{Html::style('frontend/css/style.css')}}--}}
	{{Html::style('frontend/css/responsive.css')}}
	{{Html::style('font-awesome/font-awesome.min.css')}}
	{{Html::style('frontend/css/custom-style.css')}}
	{{Html::script('frontend/js/jquery.js')}}
</head>
<body>
	<div class="container fare-cal-container">
		<div class="rows">
		<!-- <div class="col-lg-12 fare-calculation"> -->
			<section class="col-lg-3 fare-calculation">

				<?php
          $taxi = \App\TaxiFare::first();
					$initialFare = $taxi->taxi_initial_fare;
					$meterFarePerMile = 2.087;
					$totalFare = $distanceCalculated*$meterFarePerMile;
					$totalFareWithInitial = $initialFare + $totalFare;
					$tip = ($taxi->tax/100)*$totalFareWithInitial;
					$allTotalFare = $tip+$totalFareWithInitial;
					
				?>
				<div class="col-lg-3 fare-box">
					<span>Estimated Fare</span>
          <?php
            $fare = number_format($allTotalFare,'2','.','');
          ?>
					<p>{{'$'.$fare}}</p>
					{{--{{$durationCalculated}}--}}
				</div>
				<div class="col-lg-3 fare-information">
					<span>Fare Information</span>
					<div class="fare-info">
						<b>Trip Information</b>
						<p>Trip is {{$distanceCalculated}}, {{$durationCalculated}}</p>
					</div>
				</div>
				
				<div class="col-lg-3 fare-breakdown">
					<li>Initial Fare<p>{{'$'.$initialFare}}</p></li>
					<li>Add. Metered Fare<p>{{'$'.number_format($totalFare,'2','.','')}}</p></li>
					<li>Tip ({{$taxi->tax}}%)<p>{{number_format($tip,'2','.','')}}</p></li>
					<div class="estimated-taxi-fare">
						
						<b>Estimated Taxi Fare<p>{{number_format($allTotalFare,'2','.','')}}</p></b>
					</div>
				</div>
				{{Form::open(['method'=>'GET','url'=>'taxi-booking','files'=>true,'class'=>'form-horizontal'])}}
				<input type="hidden" name="start" id="start" value="<?php echo $start;?>">
				<input type="hidden" name="end" id="end" value="<?php echo $end;?>">
				<input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo $allTotalFare;?>">
				<div class="col-lg-3 book-now-button">
					<button type="submit" class="btn btn-primary">Book Now</button>
				</div>
				{{Form::close()}}
				
			</section>
			<section class="col-lg-9">
				<div id="map"></div>
			</section>
			<!-- </div> -->
			
		</div>
	</div>
{{Html::script('bootstrap/js/bootstrap.min.js')}}
{{ Html::script('js/main.js') }}
{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js') }}
{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}
{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}

{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}
<script>
    function initMap() {
        
        var markerArray = [];
        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;

        // Create a map and center it on Manhattan.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: 40.771, lng: -73.974}
        });

        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
            directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
          calculateAndDisplayRoute(
              directionsDisplay, directionsService, markerArray, stepDisplay, map);
        };
        //document.getElementById('start').addEventListener('change', onChangeHandler);
        // document.getElementById('end').addEventListener('change', onChangeHandler);
    }

      function calculateAndDisplayRoute(directionsDisplay, directionsService,
          markerArray, stepDisplay, map) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // Driving directions.
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            // document.getElementById('warnings-panel').innerHTML =
            //     '<b>' + response.routes[0].warnings + '</b>';
            directionsDisplay.setDirections(response);
            showSteps(response, markerArray, stepDisplay, map);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];
        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
          marker.setMap(map);
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
      }

      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARXlBlLHROdt2kT7QXrlMv-CJWk9rA7Ow&callback=initMap"></script>
</body>
</html>
