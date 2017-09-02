<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {{Html::style('bootstrap/css/bootstrap.min.css')}}
    {{Html::style('font-awesome/font-awesome.min.css')}}
    {{Html::style('dist/css/AdminLTE.min.css')}}
    {{Html::style('plugins/iCheck/square/blue.css')}}
    {{Html::style('css/officio.css')}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ Html::script('js/html5shiv.min.js') }}

    {{ Html::script('js/respond.min.js') }}
    <![endif]-->
</head>

<body class="hold-transition login-page">

<div class="login-box">
    @include('taxifare.flash.message')
    <div class="login-logo">
        <a href="{{url('admin/login')}}">{{ Html::image('') }}</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open(['url'=>'driver/post-login']) !!}
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}

        <div>
            <p style="color: red">{{ $errors->first('email') }}</p>
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox">Remember Me
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4 text-right">
                <button type="submit" class="btn btn-warning">Sign In</button>
            </div><!-- /.col -->
        </div>
        {!! Form::close() !!}
        <div class="acc-create">
            <a href="{{url('driver/register')}}">Create Account For Driver</a>
        </div>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
{{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}
{{ Html::script('bootstrap/js/bootstrap.min.js') }}
{{ Html::script('plugins/iCheck/icheck.min.js') }}
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<style type="text/css">
    .login-box-body >p {
    color: #fff;
    }
    .checkbox.icheck {
        color: #fff;
    }
    .icheckbox_square-blue {
        margin-right: 10px;
    }
    .acc-create a:hover {
        text-decoration: underline;
    }
</body>
</html>
