@extends('_layouts.admin.app')
@push('title','Add Activity')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Add Activity</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{ Form::open(array('route' => 'admin.activities.store','class'=>'form form-horizontal','name'=>'activity_form','id'=>'activity_form')) }}
                    <div class="form-body col-xl-8 col-xs-12">

                        <div class="form-group">
                            <label class="bmd-label-floating">Name <span class="color-red-700">*</span> </label>

                            <input maxlength="255" type="text" class="form-control  @error('activity_name') is-invalid @enderror" name="activity_name"
                                   value="{{ old('activity_name') }}"
                                   id="activity_name"  required />
                                @error('activity_name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Order <span class="color-red-700">*</span> </label>

                            <input maxlength="255" type="text" class="form-control  @error('activity_order') is-invalid @enderror" name="activity_order"
                                   value="{{ old('activity_order') }}"
                                   id="activity_order"  required />
                            @error('activity_order')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating">Remarks</label>
                            <textarea name="activity_remark" class="form-control @error('activity_remark') is-invalid @enderror" rows="2">{{ old('activity_remark') }}</textarea>
                            @error('activity_remark')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="">Status</label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio"  @if(old('activity_status')=='1')checked="checked"@endif name="activity_status" value="1">
                                    <span></span>Active</label>

                                <label class="radio radio-danger">
                                    <input type="radio"  @if(old('activity_status')=='0')checked="checked"@endif name="activity_status" value="0">
                                    <span></span>Inactive</label>
                            </div>
                            @error('activity_status')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->

                        <div class="form-actions p-t-15">
                            <div class="row">
                                <div class="col-xl-offset-3 col-xl-9">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a class="btn btn-default" href="{{route('admin.activities.index')}}">Cancel</a>
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
            $('#activity_form').validate({
                rules : {
                    activity_name: "required",
                    activity_order: "required",
                    activity_status: "required",
                },
                messages: {
                    activity_name: {
                        required: "Activity Name is required."
                    },
                    activity_order: {
                        required: "Activity Order is required."
                    },
                    activity_status: {
                        required: "Please select activity status."
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
