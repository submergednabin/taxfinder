@extends('taxifare.driver.main')
@section('title','Inbox -Taxi Driver Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Inbox</h1>
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
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mails as $list)
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
                                    <td>{{ $list->subject?$list->subject:'No Subject' }}</td>
                                    <td>
                                        <?php
                                            echo $list->messages."<br>";
                                            echo "Sender Address:"."      ".$list->sender_address."<br>";
                                            echo "Client Name:"."      ".($full_name?$full_name:'N/A')."<br>";
                                            echo "Pickup Location:"."      ".($taxiBooking->start_location?$taxiBooking->start_location:'N/A')."<br>";
                                            echo "Dropoff Location:"."      ".($taxiBooking->end_location?$taxiBooking->end_location:'N/A')."<br>";
                                            echo "Pickup Date:"."      ".($taxiBooking->pickup_date?$taxiBooking->pickup_date:'N/A')."<br>";
                                            echo "Pickup Time:"."      ".($taxiBooking->pickup_time?$taxiBooking->pickup_time:'N/A')."<br>";
                                            echo "Estimated Fare:"."      ".($taxiBooking->estimated_fare?$taxiBooking->estimated_fare:'N/A')."<br>";
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        $checkStatus = \App\MailLog::where('status',$list->status)->first();
                                    ?>
                                        <a href="" class="btn btn-primary mail-view">
                                           <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{url('driver/mail/status-update/'.$list->id)}}" method="POST" class="update-status-form">
                                            {!! csrf_field() !!}
                                            @if($checkStatus->status==1)
                                            <button type="submit" name="status" value="0" class="btn btn-sm btn-danger mail-status">
                                                UnRead
                                            </button>
                                            @else
                                            <button type="submit" name="status" value="1" class="btn btn-sm btn-danger mail-status">
                                                Read
                                            </button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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