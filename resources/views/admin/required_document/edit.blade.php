@extends('_layouts.admin.app')
@push('title','Update Required Document')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Required Document</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => ['admin.required-documents.update',$required_document],'method'=>'PUT','class'=>'form form-horizontal','name'=>'required_document_form','id'=>'required_document_form')) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Name <span class="color-red-700">*</span> </label>

                            <input type="text" class="form-control  @error('document_title') is-invalid @enderror" name="document_title"
                                   value="{{ old('document_title')??$required_document->document_title }}"
                                   id="document_title"  required />
                            @error('document_title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Document Short Title <span class="color-red-700"></span> </label>

                            <input type="text" class="form-control  @error('document_short_name') is-invalid @enderror" name="document_short_name"
                                   value="{{ old('document_short_name')??$required_document->document_short_name }}"
                                   id="document_short_name"   />
                            @error('document_short_name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Remarks</label>
                            <textarea name="document_remarks" class="form-control @error('document_remarks') is-invalid @enderror" rows="2">{{ old('document_remarks')??$required_document->document_remarks }}</textarea>
                            @error('document_remarks')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="">Status</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('document_status')=='Active' || $required_document->document_status=='Active')checked="checked"@endif name="document_status" value="Active">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('document_status')=='Inactive' || $required_document->document_status=='Inactive')checked="checked"@endif name="document_status" value="Inactive">
                                    <span></span>Inactive</label>
                            </div>
                            @error('document_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.required-documents.index')}}">Cancel</a>
                                </div>
                            </div>
                        </div><!--form-actions ends-->

                    </div><!--form-body ends-->
                    {{  Form::close() }}
                </div>
            </div>

        </div>
    </div>

@endsection


@push('post-scripts')

    <script>
        $(document).ready(function() {
            'use strict';
            // Basic Form
            $('#required_document_form').validate({
                rules : {
                    document_title: "required",
                    document_status: "required",
                },
                messages: {
                    document_title: {
                        required: "Document Title is required."
                    },
                    document_status: {
                        required: "Please select document status."
                    },
                },
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("type") == "radio") {
                        error.insertAfter(element.parent().parent());
                    }else if(element.has('option').length) {
                        error.insertAfter(element.next());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });


        });

    </script>
@endpush
