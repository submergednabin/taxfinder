@extends('taxifare.admin.main')
@section('title','Driver List - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Driver Lists</h1>
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
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->fullname?$driver->fullname:'N/A' }}</td>
                                    <td>{{ $driver->username?$driver->username:'N/A' }}</td>
                                    <td>{{ $driver->email?$driver->email:'N/A' }}</td>
                                    <td>{{Html::image($driver->image,'image',['width'=>'40','height'=>'40'])}}</td>
                                    <td>{{ $driver->phone_number?$driver->phone_number:'N/A' }}</td>
                                    <td>
                                        @if($driver->status == 1)
                                            <small>Active</small>
                                        @else
                                            <small class="inactive-status">InActive</small>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/driver/edit/'.$driver->id) }}">
                                            <i class="flaticon-edit"></i>
                                        </a>
                                        <form action="{{url('admin/driver/destroy/'.$driver->id)}}" method="DELETE" class="delete-user-form">
                                            {!! csrf_field() !!}

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="flaticon-delete-button"></i>
                                            </button>
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