@extends('_layouts.applicant.blank')
@push('title','Reset Password')
@section('content')
    <!--begin::Login-->
    <div class="login login-6 login-signin-on login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center">
        @component('auth.aside-auth') @endcomponent

        <!--begin:Content-->
            <div class="d-flex w-100 flex-center pl-15 pr-15 pt-10 pb-10 position-relative overflow-hidden auth-right-bg">
                <div class="login-wrapper mw-100">
                    <!--begin:Sign In Form-->
                    <div class="login-signin m-auto">

                        <div class="auth-smeda-logo pt-8">
                            <img src="{{ asset('assets/img/smeda-logo.png') }}" alt="Smeda Logo">
                        </div>
                        <div class="auth-login-icon pt-5">
                            <img src="{{ asset('assets/img/login-icon.png') }}" alt="Login Icon">
                        </div>
                        <div class="auth-form pt-5">
                            @component('_components.alerts-default')@endcomponent
                            {{ Form::open(array('route' => 'password.email','class'=>'kt_auth_form','name'=>'kt_auth_form','id'=>'kt_auth_form')) }}

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="text-white d-block text-left">{!! __('labels.email_address') !!}<span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                        @error('email')
                                        <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.password') !!}<span class="text-danger">*</span></label>
                                        <input  type="password" name="password" class="form-control @error('user.password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                                        @error('password')
                                        <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6"><label class="text-white d-block text-left">{!! __('labels.confirm_password') !!}<span class="text-danger">*</span></label>
                                        <input  type="password"  id="password"  name="password_confirmation" class="form-control" placeholder="Confirm Password" autocomplete="off">
                                    </div>

                                </div>


                            <div class="pb-lg-0 pb-5 pt-10">
                                <button type="submit"  class="btn auth-login-btn font-weight-bolder font-size-h6 px-6 py-2">{!! __('labels.reset_password') !!}</button>
                            </div>

                            {{  Form::close() }}
                        </div>
                    </div>
                    <!--end:Sign In Form-->


                    <div class="row mt-15">
                        <div class="col-md-8 pt-3 text-left"><span class="auth-text sample-text">{!! __('labels.already_an_account') !!}</span></div>
                        <div class="col-md-4 pl-0"><a href="{{ route('login') }}" class="register_button btn btn-white btn-block">{!! __('labels.login') !!} <i class="fa fa-arrow-right float-right"></i></a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column flex-root" style="background-color: #7D7D7D;">
            <div class="auth-left-footer">
                &copy Small and Medium Enterprises Development Authority, Government of Pakistan
            </div>

        </div>
        <div class="d-flex flex-column flex-root" style="background-color: #30807d;">
            <div class="auth-right-footer">
                Powered by Punjab Information Technology Board
            </div>

        </div>
    </div>

@endsection


@push('pre-styles')
    <link href="{{ asset('assets/css/pages/login/classic/login-6.css') }}" rel="stylesheet" type="text/css" />
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
