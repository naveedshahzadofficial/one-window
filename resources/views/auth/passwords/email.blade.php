@extends('_layouts.applicant.blank')
@push('title','Forgot Password')
@section('content')
    <!--begin::Login-->
    <div class="login login-6 login-signin-on login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center">
            @component('auth.aside-auth') @endcomponent

            <!--begin:Content-->
                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden auth-right-bg">
                    <div class="login-wrapper mw-100">
                        <!--begin:Sign In Form-->
                        <div class="login-signin max-w-450px m-auto">

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
             <div class="col-lg-12">
                 <label class="text-white d-block text-left">{!! __('labels.email_address') !!}<span
                         class="text-danger">*</span></label>
                 <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                 @error('email')
                 <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                 @enderror
             </div>
                </div>

             <div class="pb-lg-0 pb-5 pt-5 col-lg-12">
                 <button type="submit"  class="btn auth-login-btn font-weight-bolder font-size-h6 px-6 py-2">{!! __('labels.submit') !!}</button>
             </div>

        {{  Form::close() }}
                </div>
                        </div>
                            <!--end:Sign In Form-->


                        <div class="row mt-10">
                            <div class="col-md-12 pt-3 text-center"><a href="{{ route('login') }}"><span class="auth-text auth-underline sample-text">{!! __('labels.already_an_account') !!}</span></a></div>
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
                    }
                },
                messages: {
                    email: "Please enter your email."
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
