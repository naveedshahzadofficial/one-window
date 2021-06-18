@extends('_layouts.applicant.app')
@push('title','New Registration')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">Apply for Size Certification</h3>
                    </div>
                </div>

                <div class="card-body p-0">

                    @component('_components.alerts-default')@endcomponent

                    {{ Form::open(array('route' => ['applicant.applications.certifications.store', $application],'class'=>'kt_auth_form','name'=>'certification_form','id'=>'certification_form')) }}

                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-3 col-form-label  text-right">Certificate:</label>
                                        <div class="col-lg-6">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-success">
                                                    <input type="checkbox" value="1" name="is_applied"/>
                                                    <span></span>
                                                    Applied
                                                </label>
                                            </div>
                                            @error('is_applied')
                                            <div class="invalid-feedback d-block text-left">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <a href="{{ route('applicant.applications.index') }}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    </div>
                                </div>
                            </div>

                    {{  Form::close() }}

                </div>
            </div>

        </div>
    </div>

@endsection
