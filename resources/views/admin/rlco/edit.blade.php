@extends('_layouts.admin.app')
@push('title','Update RLCO')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Update RLCO</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    @livewire('rlco-form', ['rlco'=>$rlco])
                </div>
            </div>

        </div>
    </div>

@endsection

@push('pre-styles')
    <link href="{{ asset('assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('post-scripts')
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
@endpush
