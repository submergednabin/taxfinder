<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ URL::asset('frontend/image/qloo-favicon.png') }}" sizes="32x32"/>
    <title>
      @yield('title')
    </title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->

{{ Html::style('bootstrap/css/bootstrap.min.css') }}

<!-- Font Awesome -->

{{ Html::style('font-awesome/font-awesome.min.css') }}

<!-- Ionicons -->

{{ Html::style('font-awesome/ionicons.min.css') }}


{{ Html::style('plugins/datepicker/datepicker3.css') }}

{{ Html::style('plugins/daterangepicker/daterangepicker-bs3.css') }}


{{ Html::style('fonts/font/flaticon.css') }}

<!-- Select2 -->

{{ Html::style('plugins/select2/select2.min.css') }}

{{ Html::style('choosen/css/chosen.min.css') }}

<!-- Theme style -->

{{ Html::style('dist/css/AdminLTE.min.css') }}

<!-- AdminLTE Skins. We have chosen the skin-blue for this starter

          page. However, you can choose any other skin. Make sure you

          apply the skin class to the body tag so the changes take effect.

    -->

{{ Html::style('dist/css/skins/skin-blue.min.css') }}


{{ Html::style('plugins/iCheck/all.css') }}
{{ Html::style('dist/css/sweetalert.css') }}

<!-- DataTables -->


{{ Html::style('plugins/datatables/dataTables.bootstrap.css') }}


{{  Html::style('css/main.css') }}
{{ Html::style('css/radiobutton.css') }}
 {{ Html::style('css/gallery.css') }}
{{--{{ Html::style('css/errors.css') }}--}}

{{ Html::style('plugins/timepicker/bootstrap-timepicker.css') }}



{{--{!! Html::script("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js") !!}--}}


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9] -->

    {{ Html::script('js/html5shiv.min.js') }}

    {{ Html::script('js/respond.min.js') }}

    {{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}

    {{--{{ Html::script('chart/highcharts.js') }}--}}

</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

{{----}}

{{----}}


<!-- Main Header -->

    <header class="main-header">


        <!-- Logo -->

        <a href="{{ url('driver/dashboard') }}" class="logo">

            <!-- mini logo for sidebar mini 50x50 pixels -->

        {{--<span class="logo-mini"></span>--}}

        <!-- logo for regular state and mobile devices -->

            <span class="logo-lg">

               {{ Html::image('', '',['width'=>'120px','height'=>'60px']) }}

            </span>

        </a>


        <!-- Header Navbar -->

        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >

                <span class="sr-only">Toggle navigation</span>

            </a>

            <!-- Navbar Right Menu -->

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">


                @if(Auth::guard('taxiDriver')->user())

                    <!-- User Account Menu -->

                        <li class="dropdown user user-menu">

                            <!-- Menu Toggle Button -->

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <!-- The user image in the navbar-->


                            {{ Auth::guard('taxiDriver')->user()->fullname }}


                            <!-- hidden-xs hides the username on small devices so only the image appears. -->

                            

                            </a>

                            <ul class="dropdown-menu">

                                <!-- The user image in the menu -->

                                <li class="user-header">

                                    <?php
                                        $userImage = Auth::guard('taxiDriver')->user()->image;

                                    ?>
                                    @if(!$userImage){
                                       
                                       {{Html::image('')}}
                                    
                                    @else
                                    {{ Html::image('dist/img/avatar5.png', 'User Image', ['class'=>'img-circle']) }}
                                    @endif
                                    <p>

                                        {{ Auth::guard('taxiDriver')->user()->fullname }}

                                    </p>


                                </li>


                                <!-- Menu Body -->


                                <!-- Menu Footer-->

                                <li class="user-footer">

                                    <div class="pull-left">

                                        <a href="{{ url('driver/profile') }}" class="btn btn-default">Profile</a>

                                    </div>

                                    <div class="pull-right">

                                        <a href="{{ url('driver/logout') }}" class="btn btn-warning">Sign out</a>

                                    </div>

                                </li>

                            </ul>

                        </li>

                        <!-- Control Sidebar Toggle Button -->

                        {{--<li>--}}

                        {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}

                        {{--</li>--}}

                </ul>
                @endif

            </div>

        </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu nav" id="side-menu">

                <!-- Optionally, you can add icons to the links -->
                @if(Auth::guard('taxiDriver')->user())

                    <li class="treeview">

                        <a href="#">

                            <i class="fa fa-user"></i>

                            <span>User</span>

                            <i class="fa fa-angle-left pull-right"></i>

                        </a>

                        <ul class="treeview-menu">
                            <li><a href="{{ url('driver/user') }}">Edit Driver</a></li>
                        </ul>
                    </li>

                    <li class="treeview">

                        <a href="#">

                            <i class="fa fa-file-image-o"></i>

                            <span>Mail</span>

                            <i class="fa fa-angle-left pull-right"></i>

                        </a>
                        <ul class="treeview-menu">
                            <?php
                                $count = \App\MailLog::where('status',1)->count();
                            ?>
                            <li><a href="{{ url('driver/mail/inbox') }}">Inbox{{"(".$count.")"}}</a></li>
                        
                        </ul>

                    </li>
                @endif
            </ul>
            <!-- /.sidebar-menu -->

        </section>

        <!-- /.sidebar -->

    </aside>


    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">


        @yield('content')


    </div>
    @include('taxifare.partials.popUpModal')
    <div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript">

    var APP_URL = {!! json_encode(url('/')) !!};

</script>

<![endif]-->

{{ Html::script('bootstrap/js/bootstrap.min.js') }}

{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}

{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}

{{ Html::script('dist/js/sweetalert.min.js') }}

{{ Html::script('js/main.js') }}

{!! Html::script('plugins/iCheck/icheck.min.js') !!}

{{ Html::script('plugins/select2/select2.full.min.js') }}

{{ Html::script('choosen/js/chosen.jquery.min.js') }}

{{ Html::script('plugins/ckeditor/ckeditor.js') }}


{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}

{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js') }}


{{ Html::script('dist/js/app.min.js') }}


{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}
{{ Html::script('js/map.js') }}
<!-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDahTFo6d3O6opOJ6rndcw9IplFimxkqw&callback=initMap&libraries=places">

</script> -->


<!-- page script -->


<script>
    $(function () {
        $(".select2").select2();
    });
</script>

<script>

    $(document).ready(function () {

        $('#date-range').daterangepicker();

    });


</script>

<script>

    $(function () {

        var url = window.location;

        var element = $('ul.sidebar-menu a').filter(function () {

            return this.href == url || url.href.indexOf(this.href) == 0;

        }).addClass('active').parent().parent().addClass('in').parent();

        if (element.is('li')) {

            element.addClass('active');

        }
    });

</script>


</body>

</html>












