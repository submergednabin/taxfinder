@extends('taxifare.admin.main')
@section('title','Client List - Admin Panel | Taxi Fare Finder')
@section('content')
	<section class="content-header">
			<h1>Client List</h1>
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $user)
                                <tr>
                                    <td>{{ $user->first_name?$user->first_name:'N/A' }}</td>
                                    <td>{{ $user->last_name?$user->last_name:'N/A' }}</td>
                                    <td>{{ $user->username?$user->username:'N/A' }}</td>
                                    <td>{{ $user->email?$user->email:'N/A' }}</td>
                                    <?php echo $user->image;?>
                                    <td>{{Html::image($user->image,'image',['width'=>'40','height'=>'40'])}}</td>
                                    <td>Admin</td>
                                    <td>{{ $user->Mobile?$user->Mobile:'N/A' }}</td>
                                    <td>
                                        @if($user->status == 1)
                                            <small>Active</small>
                                        @else
                                            <small class="inactive-status">InActive</small>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/user/edit/'.$user->id) }}">
                                            <i class="flaticon-edit"></i>
                                        </a>

                                        <form action="{{url('admin/user/destroy/'.$user->id)}}" method="DELETE" class="delete-user-form">
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