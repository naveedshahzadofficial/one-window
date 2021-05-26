<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{ url('/')}}">
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @stack('title','Dashboard') - @stack('app-name',config('app.name', 'Admin Panel'))
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('metas')
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
@show
<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@stack('pre-styles')
@section('styles')
    <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/square/blue.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
        @livewireStyles
@show
@stack('post-styles')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var BASE_URL = "{{ url('/')}}";
    </script>
</head>
<body class="hold-transition">

<div class="wrapper">
    <div class="row auth-row">
        <div class="col-md-6 auth-left-bg-img">
            <div class="auth-left-wrapper">

            <div class="auth-logo">
                <img src="{{ asset('assets/img/main-logo.png') }}" alt="SMERP">
            </div>

            <div class="auth-logo-caption">
                <span>SME</span>
                <span>REGISTRATION</span>
            </div>

                <div class="auth-nbdp-logo">
                    <img src="{{ asset('assets/img/nbdp-logo.png') }}" alt="NBDP">
                </div>

                <div class="auth-left-footer">
                    &copy Small And Medium Enterprises Development Authority
                </div>

            </div>
        </div>
        <div class="col-md-6 auth-right-bg-img">
            <div class="auth-right-wrapper">
            <div class="auth-smeda-logo">
                <img src="{{ asset('assets/img/smeda-logo.png') }}" alt="Smeda Logo">
            </div>
                <div class="auth-login-icon">
                    <img src="{{ asset('assets/img/login-icon.png') }}" alt="Login Icon">
                </div>

                @yield('content')

                <div class="auth-right-footer">
                    &copy Small And Medium Enterprises Development Authority
                </div>

            </div>
        </div>
    </div>

</div>


@stack('pre-scripts')
@section('scripts')
<!-- jQuery 2.1.4 -->
<script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
@livewireScripts
@show
@stack('post-scripts')

</body>
</html>

