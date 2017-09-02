<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Message</title>
</head>
<body>
	<p>This is the Email generated from <a href="javascript::void(0)">Taxi Fare Calculator and Booking Website.</a></p><br>
	<p>Sender Name: {{$fullname}}</p><br>
	<p>Email Sent By: {{$sender_address}}</p><br>
	<p>Email Received By: {{$receiver_address}}</p><br>
	<p>{{$messages}}</p><br>
	<p>Number of Passenger: {{$no_passenger}}</p><br>
	<p>Pickup Date: {{$pickup_date}}</p><br>
	<p>Pickup Time: {{$pickup_time}}</p><br>
	<p>Start Location: {{$start_location}}</p><br>
	<p>End Location: {{$end_location}}</p><br>
	<p>Estimated Fare: {{$estimated_fare}}</p><br>
</body>
<style type="text/css">
	p{
		color:red;
		font-size: 14px
		font-weight:400;
		line-height: 10px;
	}
	body{
		display: block;
	}
</style>
</html>