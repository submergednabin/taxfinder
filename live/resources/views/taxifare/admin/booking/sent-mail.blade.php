@extends('taxifare.admin.main')
@section('title','Client List - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Taxi Booked</h1>
	</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @include('taxifare.flash.message')
            <div class="box">
                <div class="box-body">
                    <div class="table-reponsive">
                        <table id="example1" class="table table-bordered table-striped user-list">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Pickup Location</th>
                                <th>Dropoff Location</th>
                                <th>No. of Passenger</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Estimated Fare</th>
                                <th>Sender Email</th>
                                <th>Receiver Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sentMails as $list)
                                <?php 
                                    $booking_id = $list->booking_id;
                                    $taxiBooking = \App\TaxiBooking::find($booking_id);
                                    $user = \App\User::find($taxiBooking->user_id);
                                    if($user->middle_name){
                                        $full_name = $user->first_name.' '.$user->middle_name.' '.$user->last_name;
                                    }else{
                                        $full_name = $user->first_name.' '.$user->last_name;
                                    }
                                ?>
                                <tr>
                                    <td>{{$full_name?$full_name:'N/A'}}</td>
                                    <td>{{ $taxiBooking->start_location?$taxiBooking->start_location:'N/A' }}</td>
                                    <td>{{ $taxiBooking->end_location?$taxiBooking->end_location:'N/A' }}</td>
                                    <td>{{ $taxiBooking->no_passenger?$taxiBooking->no_passenger:'N/A' }}</td>
                                    <td>{{$taxiBooking->pickup_date}}</td>
                                    <td>{{ $taxiBooking->pickup_time?$taxiBooking->pickup_time:'N/A' }}</td>
                                    <td>{{ $taxiBooking->estimated_fare?$taxiBooking->estimated_fare:'N/A' }}</td>
                                    <td>{{ $list->sender_address }}</td>
                                    <td>{{ $list->receiver_address }}</td>
                                    <td>{{ $list->subject }}</td>
                                    <td>{{ $list->messages }}</td>
                                    <td>
                                        <form action="{{url('admin/mail-sent/destroy/'.$list->id)}}" method="DELETE" class="delete-user-form">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="flaticon-delete-button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<script>
    $(function () {
        $('#example1').DataTable({
            "pageLength": 100,
            "responsive":true,
            "dom": '<"top"pfl<"clear">>rt<"bottom"p<"clear">>'
        });
    });
</script>
@stop