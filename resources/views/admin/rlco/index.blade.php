@extends('_layouts.admin.app')
@push('title','All RLCOs')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">All RLCOs</h3>
            </div>

            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('admin.rlcos.create') }}" class="btn btn-custom-color font-weight-bolder">
											<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path
            d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                    New RLCO</a>
                <!--end::Button-->
            </div>

        </div>
        <div class="card-body">
            @component('_components.alerts-default')@endcomponent

            <div class="kt-form kt-form--fit mb-15">
                <div class="row mb-6">

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Province:</label>
                        <select name="province_id" onchange="getProvinceDistricts(this)" class="form-control select2"
                                id="province_id">
                            <option value="">--- Select ---</option>
                            @isset($provinces)
                                @foreach($provinces as $province)
                                    <option
                                        {{ request()->get('province_id')==$province->id?'selected':'' }} value="{{ $province->id }}">{{ $province->province_name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>District:</label>
                        <select name="district_id" class="form-control select2" id="district_id">
                            <option value="">--- Select ---</option>
                        </select>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Business Category:</label>
                        <select name="business_category_id" class="form-control select2" id="business_category_id">
                            <option value="">--- Select ---</option>
                            @isset($business_categories)
                                @foreach($business_categories as $business_category)
                                    <option
                                        {{ request()->get('business_category_id')==$business_category->id?'selected':'' }} value="{{ $business_category->id }}">{{ $business_category->category_name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Business Registration Status:</label>
                        <div class="radio-inline mt-3">
                            @isset($registration_status)
                                @foreach($registration_status as $status)
                                    <label class="radio radio-success">
                                        <input
                                            {{ request()->get('business_registration_status_id')==$status->id?'checked':'' }} type="radio"
                                            name="business_registration_status_id"
                                            class="business_registration_status_id" value="{{ $status->id }}">
                                        <span></span>{{ $status->name }}</label>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                </div>
                <div class="row mt-8">

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Registration No.</label>
                        <input type="text" name="registration_no" id="registration_no" class="form-control"
                               placeholder="Registration No.">
                    </div>


                    <div class="col-lg-9 mt-7">
                        <button onclick="reDrawDataTable();" class="btn btn-custom-color btn-primary--icon"
                                id="kt_search">
													<span>
														<i class="la la-search text-white"></i>
														<span>Search</span>
													</span>
                        </button>&nbsp;&nbsp;
                        <button onclick="resetForm();" class="btn btn-secondary btn-secondary--icon" id="kt_reset">
													<span>
														<i class="la la-close"></i>
														<span>Reset</span>
													</span>
                        </button>
                    </div>
                </div>
            </div>

            <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="my_datatable">
                <thead>
                <tr>
                    <th>Registration ID</th>
                    <th>Sr. No.</th>
                    <th>Registration No.</th>
                    <th>Business Name</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

@endsection
