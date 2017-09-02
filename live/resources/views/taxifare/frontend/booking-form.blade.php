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
	{{Html::style('frontend/css/bootstrap-timepicker.min.css')}}
	{{Html::script('frontend/js/jquery.js')}}
  {{Html::script('bootstrap/js/bootstrap.min.js')}}
  {{Html::script('frontend/js/bootstrap-timepicker.min.js') }}
</head>
<body>
	<div class="container booking-box">
		<div class="rows">
        <section class="col-md-12 text-center">
          {{Form::open(['method'=>'POST','url'=>'taxi-booking','class'=>'form-horizontal','files'=>true])}}
            <div class="form-group">
              <div class="col-sm-2">
                <label>Passengers</label>
              </div>
              <div class="col-sm-4">
                <select name="no_passenger" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6+</option>
                </select>
                {{--{{ Form::selectRange('no_passenger', 1, 100,1, ['class' => 'form-control']) }}--}}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Pickup Date</label>
              </div>
              <div class="col-sm-4">
                {{ Form::date('pickup_date',null,['class' => 'form-control']) }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Pickup Time</label>
              </div>
              <div class="col-sm-4">
                 {{Form::text('pickup_time',null,['class'=>'form-control','id'=>'datetimepicker4'])}}
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Pickup At</label>
              </div>
              <div class="col-sm-4">
              {{Form::text('start_location',$pickupLocation,['class'=>'form-control','id'=>'origin-input','placeholder'=>'Where to start?','readonly'=>'readonly'])}}
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
                <label>Dropoff At</label>
              </div>
              <div class="col-sm-4">
              {{Form::text('end_location',$dropLocation,['class'=>'form-control','id'=>'destination-input','placeholder'=>'Where to end?','readonly'=>'readonly'])}}
                @if ($errors->has('end_location'))
                      <div>
                      <span class="help-block">
                        {{ $errors->first('end_location') }}
                      </span>
                      </div>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label>Estimated Fare</label>
              </div>
              <div class="col-sm-4">
                {{Form::text('estimated_fare',$estimatedPrice,['class'=>'form-control','id'=>'disablefield','readonly'=>'readonly'])}}
              </div>
            </div>
            <div class="col-sm-6 ">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          {{Form::close()}}
        </section>
			
		</div>
	</div>
  

{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js') }}
{{--{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}--}}
{{--{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}--}}

{{--{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}--}}
<script type="text/javascript">
      $(function () {
        $('#datetimepicker4').timepicker({
          maxHours:24,
        });
      });
      $(function(){
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("pickup_date")[0].setAttribute('min', today);
      });
      var dt = new Date();
      var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
      var $inputs = $('input');
      $("input#datetimepicker4").change(function(){
        var data = $("#datetimepicker4").val();
        console.log(data);
      });

      console.log(time);
      // document.getElementById("disablefield").disabled = true;
    /*  function tConvert (time) {
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { 
    time = time.slice (1);  
    time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; //
  }
  return time.join ('');
}

console.log(tConvert (time));
*/
</script>
<script type="text/javascript">
    var autocomplete;
        function mapInitialize() {
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARXlBlLHROdt2kT7QXrlMv-CJWk9rA7Ow&libraries=places&callback=mapInitialize" async defer></script>
</body>
</html>
