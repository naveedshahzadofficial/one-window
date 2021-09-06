@extends('_layouts.frontend.app')
@section('content')

    <div class="container my-5" style="min-height: 310px;">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">{{ $rlco->rlco_name??'RLCO Detail' }}</h3>
                </div>
            </div>

            <div class="card-body">
                @component('_components.rlco_detail',['rlco'=>$rlco]) @endcomponent
            </div>
        </div>
        <!--end::Card-->
    </div>

@endsection

@push('post-styles')
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/applicant_custom.css')}}"/>
    <style>
        .section_box, .card.card-custom, .card-body, .bg-custom-color{
            background-color: rgba(255, 255, 255, 0.9) !important;
        }
        .main_section_heading{
            background-color: #000c60;
        }
        .card.card-custom > .card-header .card-title, .card.card-custom > .card-header .card-title .card-label{
            color: #000c60;
        }
    </style>
@endpush

@push('post-scripts')
    <script>
        var KTAppSettings = {};
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
@endpush
