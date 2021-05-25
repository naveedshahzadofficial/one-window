@extends('layouts.auth')
@push('title','Registration')
@section('content')
    <div class="login-box">


        <div class="card-body">
            <img src="{{ asset('assets/images/login_screen/Login-Icon.png') }}" class="max-h-150px pb-5" alt="">

            @component('_components.alerts-default')@endcomponent

            @livewire('registration')

            <div class="row">
                <div class="col-8">

                </div>

                <div class="col-4">

                    <a href="{{ url('/login') }}" class="login_footer">Sign In</a>

                </div>

            </div>

        </div>


    </div>

@endsection

@push('post-scripts')
    <script>
        $(document).ready(function() {
           /* $(".cnic_no").inputmask({
                "mask": "99999-9999999-9",
                unmaskAsNumber: true,
                removeMaskOnSubmit:true,
                autoUnmask:false,
                greedy:true,
                insertMode:true,
                clearIncomplete:false,
                clearMaskOnLostFocus:true,
            });*/

        });

    </script>
@endpush
