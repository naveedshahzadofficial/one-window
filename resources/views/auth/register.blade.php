@extends('_layouts.applicant.blank')
@push('title','Registration')
@section('content')
    <!--begin::Login-->
    <div class="login login-6 login-signin-on login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center">
            @component('auth.aside-auth') @endcomponent
            <!--begin:Content-->
                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden auth-right-bg">
                    <div class="login-wrapper mw-100">
                        <!--begin:Sign In Form-->
                        <div class="login-signin">

                <div class="auth-smeda-logo pt-8">
                    <img src="{{ asset('assets/img/smeda-logo.png') }}" alt="Smeda Logo">
                </div>
                <div class="auth-login-icon pt-10">
                    <img src="{{ asset('assets/img/login-icon.png') }}" alt="Login Icon">
                </div>
                <div class="auth-form pt-5">
                    @component('_components.alerts-default')@endcomponent

                    @livewire('registration')

                </div>

                            <div class="row mt-15">
                                <div class="col-md-12 pt-3 text-left"><span class="auth-text sample-text">{!! __('labels.already_an_account') !!}</span></div>
                                <div class="col-md-12 pt-3"><a href="{{ route('login') }}" class="register_button btn btn-white btn-block">{!! __('labels.login') !!} <i class="fa fa-arrow-right float-right"></i></a></div>
                            </div>


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
