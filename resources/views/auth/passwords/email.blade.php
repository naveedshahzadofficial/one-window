@extends('layouts.auth')
@push('title','Forgot Password')
@section('content')

    @component('_components.alerts-default')@endcomponent

    <form action="{{ route('password.email') }}" method="post" id='recover_password_form'>
        {{ csrf_field() }}
        <div class="auth-form">


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="auth-login-btn">
                <button type="submit" class="btn btn-dark btn-block">Request new password</button>
            </div>

            <div class="auth-new-register">
                <div class="pull-right">
                    <a href="{{ route('login') }}" class="register_button btn btn-dark btn-block">Sign In <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>


        </div>

    </form>

@endsection
