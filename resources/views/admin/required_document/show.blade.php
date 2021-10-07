@extends('_layouts.admin.app')
@push('title','Required Documents')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $required_document->document_title  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $required_document->document_status=='Active'?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $required_document->document_status  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent

                    @if(!empty($required_document->document_remarks))
                    <div class="form-body col-xl-12 col-xs-12">
                        <div class="col-lg-12">
                            <strong>Remarks</strong>
                            <label class="bmd-label-floating">{{ $required_document->document_remarks }}</label><br>
                        </div>
                    </div>
                    @endif

            </div>

        </div>
    </div>
@endsection
