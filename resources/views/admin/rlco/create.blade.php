@extends('_layouts.admin.app')
@push('title','New RLCO')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">NEW RLCO</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    @livewire('rlco-form')
                </div>
            </div>

        </div>
    </div>

@endsection

@push('pre-styles')
    <link href="{{ asset('assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endpush