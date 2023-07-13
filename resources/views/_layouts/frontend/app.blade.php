<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ url('/')}}">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title','Home') - @stack('app-name',config('app.name', 'SMEDA One Window'))</title>
    @section('metas')
        <meta name="keywords" content="RLCOs" />
        <meta name="description" content="RLCOs" />
    @show
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('pre-styles')
    @section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    @show
    @livewireStyles
    @stack('post-styles')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    </style>
</head>

<body>
<!-- background image / main div start -->
<div  class="bg container-fluid full-width">
    <!-- header start for Logo -->
    <header class="row">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('frontend/Inner-Logo.png') }}" alt=""></a>
        </div>
    </header>
    <!-- header end for Logo -->

    @yield('content')

    <!-- footer div start -->
    <footer class="main-footer">
    <div class="row">
        <div class="overlay">
            <div>
                <div class="col-md-12 mt-3 footer text-center">
                    <a href="#news">Overview</a>
                    <a href="#news">Starting a business</a>
                    <a href="#contact">EoDB Punjab</a>
                    <a href="#about">EoDB Pakistan</a>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                            <span class="nowrap footer2">©Automation of Business Regulations, Government of
                                Punjab</span>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="nowrap1 footer2 ">Powerd by:Punjab Information Technology Board</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- footer div end -->
</div>
<!-- background image / main div end -->





<script type="text/javascript">
    var BASE_URL = "{{ url('/')}}";
</script>
@stack('pre-scripts')

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@show
@livewireScripts
@stack('post-scripts')

</body>

</html>
