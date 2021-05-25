@extends('layouts.auth')
@push('title','Login')
@section('content')

    <div class="login-box">


        <div class="card-body">
            <img src="{{ asset('assets/images/login_screen/Login-Icon.png') }}" class="max-h-150px pb-5 image_settings"
                 alt="">

            @component('_components.alerts-default')@endcomponent

            <form action="{{ url('/login_user') }}" method="post" id='login_form'>
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" class="form-control" name='email' placeholder="Email">

                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>


                <div class="row">

                    <div class="col-12">
                        <button type="submit" class="btn btn-dark btn-block" style="background-color: #404040;">Sign
                            In
                        </button>
                    </div>

                </div>
                <br>


            </form>


            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary" style="text-align: left;">
                        <input type="checkbox" id="remember">
                        <label for="remember" class="new_register_text">
                            Remember Me
                        </label>
                    </div>
                </div>

                <div class="col-4">

                    <a href="{{ route('password.request') }}" class="login_footer">Forgot Password?</a>

                </div>

            </div>


            <div class="row">

                <div class="col-6 new_register">
                    <img src="{{ asset('assets/images/login_screen/New-Registration-icon.png') }}" class="max-h-150px"
                         alt="">

                    <a href="#" class="new_register_text">New Registration</a>
                </div>

                <div class="col-6" style="padding-top: 18px;display: flex;">

                    <a href="{{ url('/register') }}" class=" register_button btn btn-dark btn-block">Register</a>
                    <a style='margin: 0;width: 50%;' class="btn btn-dark btn-block"> <img
                            src="{{ asset('assets/images/login_screen/arrow-Icon.png') }}" class="max-h-150px" alt="">
                    </a>

                </div>


            </div>


        </div>


    </div>


@endsection
