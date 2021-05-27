@extends('_layouts.applicant.blank')
@push('title','Reset Password')
@section('content')
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        @component('auth.aside-auth') @endcomponent
        <div class="d-flex flex-center flex-row-fluid auth-right-bg">
            <div class="d-flex flex-column flex-center pt-lg-0">
                <div class="auth-smeda-logo pt-8">
                    <img src="{{ asset('assets/img/smeda-logo.png') }}" alt="Smeda Logo">
                </div>
                <div class="auth-login-icon pt-10">
                    <img src="{{ asset('assets/img/login-icon.png') }}" alt="Login Icon">
                </div>
                <div class="auth-form pt-5">
                    @component('_components.alerts-default')@endcomponent
                    {{ Form::open(array('route' => 'password.email','class'=>'kt_auth_form','name'=>'kt_auth_form','id'=>'kt_auth_form')) }}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-envelope"></i>
																</span>
                            </div>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                                </div>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="la la-lock"></i>
																</span>
                                </div>
                                <input type="password" id="password" name="password_confirmation" class="form-control" placeholder="Password">
                            </div>
                        </div>

                    <div class="pb-lg-0 pb-5 pt-10">
                        <button type="submit"  class="btn auth-login-btn font-weight-bolder font-size-h6 px-6 py-2">Request new password</button>
                    </div>

                    {{  Form::close() }}
                </div>

                <div class="auth-new-register  pt-15">
                    <div class="float-right">
                        <a href="{{ route('login') }}" class="register_button btn btn-white btn-block">Login <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="auth-right-footer  pt-30">
                    &copy Small And Medium Enterprises Development Authority
                </div>

            </div>
        </div>
    </div>
@endsection


@push('pre-styles')
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
@endpush


@push('post-scripts')
    <script>
        $(document).ready(function() {
            'use strict';
            // Basic Form
            $('#kt_auth_form').validate({
                rules:{
                    email: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength : 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo : "#password"
                    }
                },
                messages: {
                    email: "Please enter your email.",
                    password: {
                        required: "Please enter your password.",
                    },
                    password_confirmation: {
                        required: "Please enter your Confirm password.",
                    }
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid').closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {

                    $(element).prev().removeClass('is-invalid').closest('.form-group').removeClass('has-danger');
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                }
            });


        });
    </script>
@endpush
