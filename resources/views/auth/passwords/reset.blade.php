@extends('layouts.auth')
@push('title','Reset Password')
@section('content')
    <div class="login-box">


        <div class="card-body">
            <img src="{{ asset('/storage/images/login_screen/Login-Icon.png') }}" class="max-h-150pxlogin_image image_settings" alt="">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <form action="{{ route('password.update') }}" method="post" id='recover_password_form'>
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name='password'>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name='password_confirmation' placeholder="Confirm Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-12">
                    <button type="submit" class="btn btn-dark btn-block" style="background-color: #404040;">Change password</button>
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




    </div>
@endsection
