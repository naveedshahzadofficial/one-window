@extends('layouts.app')

@section('content')

    @component('_components.alerts-default')@endcomponent

    <form action="{{ route('password.confirm') }}" method="post" id='recover_password_form'>
        @csrf
        <div class="auth-form">


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="auth-login-btn">
                <button type="submit" class="btn btn-dark btn-block">Confirm Password</button>
            </div>

            <div class="auth-new-register">
                <div class="pull-right">
                    <a href="{{ route('login') }}" class="register_button btn btn-dark btn-block">Sign In <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>


        </div>

    </form>
@endsection
