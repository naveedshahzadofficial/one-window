@extends('layouts.auth')
@push('title','Forgot Password')
@section('content')
    <div class="login-box">
        <div class="card-body">
            <img src="{{ asset('/storage/images/login_screen/Login-Icon.png') }}" class="max-h-150px image_settings" alt="">

            @component('_components.alerts-default')@endcomponent

            <form action="{{ route('password.email') }}" method="post" id='forgot-password-form'>
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" class="form-control" name='email' placeholder="Email">

                </div>

                <div class="row">

                    <div class="col-12">
                        <button type="submit" class="btn btn-dark btn-block" style="background-color: #404040;">Request new password</button>
                    </div>

                </div>
                <br>


            </form>


            <div class="row">
                <div class="col-8">

                </div>

                <div class="col-4">

                    <a href="{{ url('/login') }}" class="login_footer">Sign In</a>

                </div>

            </div>


            <div class="row">

                <div class="col-6 new_register" >
                    <img  src="{{ asset('/storage/images/login_screen/New-Registration-icon.png') }}" class="max-h-150px" alt="">

                    <a href="#" class="new_register_text">New Registration</a>
                </div>

                <div class="col-6" style="padding-top: 18px;display: flex;">

                    <a  href="{{ url('/register') }}" class=" register_button btn btn-dark btn-block">Register</a>
                    <a href="{{ url('/register') }}" style='margin: 0;width: 50%;' class="btn btn-dark btn-block"> <img  src="{{ asset('/storage/images/login_screen/arrow-Icon.png') }}" class="max-h-150px" alt="">
                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
