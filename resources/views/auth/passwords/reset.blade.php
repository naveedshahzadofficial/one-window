@extends('layouts.auth')
@push('title','Reset Password')
@section('content')

    @component('_components.alerts-default')@endcomponent

    <form action="{{ route('password.update') }}" method="post" id='recover_password_form'>
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="auth-form">


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>

            <div class="auth-login-btn">
                <button type="submit" class="btn btn-dark btn-block">Change password</button>
            </div>

            <div class="auth-remember-me">
                <div class="pull-right">
                    <a href="{{ route('login') }}" class="auth-text-sm">Sign In</a>
                </div>
            </div>


        </div>

    </form>

@endsection
