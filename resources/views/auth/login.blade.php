@extends('layouts.auth')
@push('title','Login')
@section('content')

    @component('_components.alerts-default')@endcomponent
    {{ Form::open(array('route' => 'login','class'=>'m-form m-form--state form-horizontal','name'=>'login_form','id'=>'login_form')) }}

    <div class="auth-form">


        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="auth-login-btn">
            <button type="submit" class="btn btn-dark btn-block">Login</button>
        </div>

        <div class="auth-remember-me">
            <div class="icheck-primary pull-left">
                <input type="checkbox" id="remember">
                <label for="remember" class="auth-text">
                    Remember Me
                </label>
            </div>
            <div class="pull-right">
                <a href="{{ route('password.request') }}" class="auth-text-sm">Forgot Password?</a>
            </div>
        </div>

        <div class="auth-new-register">
            <div class="pull-left">
                <a href="{{ route('register') }}" class="auth-text sample-text"><i class="fa fa-user"></i> New Registration</a>
            </div>
            <div class="pull-right">
                <a href="{{ route('register') }}" class="register_button btn btn-dark btn-block">Register <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>

    </div>
    {{  Form::close() }}

@endsection
