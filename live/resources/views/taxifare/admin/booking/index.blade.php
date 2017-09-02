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
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taxiLists as $list)
                                <?php 
                                    $user_id = $list->user_id;
                                    $user = \App\User::find($user_id);
                                ?>
                                <tr>
                                    <td>{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name}}</td>
                                    <td>{{ $list->start_location?$list->start_location:'N/A' }}</td>
                                    <td>{{ $list->end_location?$list->end_location:'N/A' }}</td>
                                    <td>{{ $list->no_passenger?$list->no_passenger:'N/A' }}</td>
                                    <td>{{$list->pickup_date}}</td>
                                    <td>{{ $list->pickup_time?$list->pickup_time:'N/A' }}</td>
                                    <td>{{ $list->estimated_fare?$list->estimated_fare:'N/A' }}</td>
                                    <td>
                                        <!-- <a class="btn btn-primary btn-sm" href="{{ url('admin/client/edit/'.$list->id) }}">
                                            <i class="flaticon-edit"></i>
                                        </a> -->

                                        <form action="{{url('admin/taxi-booking/destroy/'.$list->id)}}" method="DELETE" class="delete-user-form">
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