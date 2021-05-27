@extends('_layouts.applicant.blank')
@push('title','Registration')
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

                @livewire('registration')

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
