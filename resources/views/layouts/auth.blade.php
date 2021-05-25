<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @stack('title','Authentication') - @stack('app-name',config('app.name', 'Admin Panel'))
    </title>

    <base href="{{ url('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('metas')
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    @show

    @stack('pre-styles')
    @section('styles')

  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/custom.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> -->

  <link rel="stylesheet" href="{{ asset('assets/plugins/font/stylesheet.css') }}">
    @show
    @livewireStyles
    @stack('post-styles')
    <link rel="shortcut icon" href="" />
    <script type="text/javascript">
        var BASE_URL = "{{ url('/')}}";
    </script>

</head>
<body class="hold-transition login-page_main">
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 col-md-6 back_ground_class" style="background-image: url({{ asset('assets/images/login_screen/Image.jpg') }});">

            <div class="text-center">
                <div class="sme_sections">

                    <img src="{{ asset('assets/images/login_screen/Government-of-Pakistan.png') }}" class="max-h-150px pb-5" alt="">
                    <div class="">
                        <h1 class="sme_register">SME</h1>
                        <h1 class="sme_register">REGISTRATION</h1>
                    </div>
                </div>

                <div class="sme_sections">

                    <img src="{{ asset('assets/images/login_screen/Program-NBDP-Logo.png') }}" class="max-h-150px pb-5" alt="">

                </div>

                <div class="white_color text-center col-md-12">© Small And Medium Enterprises Development Authority</div>

            </div>

        </div>
        <div class="col-lg-6  col-md-6 login_setting login_color" style="padding-right: 0px !important;">
            <div class="text-center">
                <div class="flex-center2">
                    <img src="{{ asset('assets/images/login_screen/Smeda-Logo.png') }}" class="max-h-150px login_image image_settings" alt="">
                    @yield('content')
                </div>
                <div class="login_footer footer text-center col-md-12">Powered By: Punjab Information Technology Board</div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- jQuery -->
@stack('pre-scripts')
@section('scripts')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<!-- jquery-validation -->
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/jquery.inputmask.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@show
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@livewireScripts
@stack('post-scripts')


</html>
