@extends('_layouts.admin.app')
@push('title','All SMEs Admin Panel')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">All SMEs</h3>
            </div>

        </div>
        <div class="card-body">
        @component('_components.alerts-default')@endcomponent

            <div class="kt-form kt-form--fit mb-15">
                <div class="row mb-6">
                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Province:</label>
                        <select name="province_id" onchange="getProvinceDistricts(this)" class="form-control select2" id="province_id">
                            <option value="">--- Select ---</option>
                            @isset($provinces)
                                @foreach($provinces as $province)
                            <option {{ request()->get('province_id')==$province->id?'selected':'' }} value="{{ $province->id }}">{{ $province->province_name }}</option>
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
                                    <option {{ request()->get('business_category_id')==$business_category->id?'selected':'' }} value="{{ $business_category->id }}">{{ $business_category->category_name }}</option>
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
                                <input {{ request()->get('business_registration_status_id')==$status->id?'checked':'' }} type="radio" name="business_registration_status_id" class="business_registration_status_id" value="{{ $status->id }}">
                                <span></span>{{ $status->name }}</label>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                </div>
                <div class="row mt-8">
                    <div class="col-lg-12">
                        <button onclick="reDrawDataTable();" class="btn btn-custom-color btn-primary--icon" id="kt_search">
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
                        </button></div>
                </div>
             </div>

        <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="my_datatable">
                <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Business Name</th>
                    <th>Applicant Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

@endsection

@push('post-scripts')
    <script type="text/javascript">
        var myDataTable;
        $(function () {

            myDataTable = $('#my_datatable').DataTable({
                language: {
                    infoFiltered: ""
                },
                processing: true,
                pageLength: 30,
                serverSide: true,
                searching: false,
                ajax: {
                    url: '{{ route('admin.applications.index-ajax') }}',
                    type: "POST",
                    data: function (row) {
                        row.province_id= $('#province_id').val();
                        row.district_id= $('#district_id').val();
                        row.business_category_id=$('#business_category_id').val();
                        row.business_registration_status_id=$('.business_registration_status_id:checked').val();
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'business_name', name: 'business_name'},
                    {data: 'first_name', name: 'first_name', render:function(data,type,row,meta){
                        return row.first_name+ " "+row.last_name;
                    } },
                    {data: 'personal_email', name: 'personal_email'},
                    {data: 'personal_mobile_no', name: 'personal_mobile_no'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false, searchable: false
                    },
                ],

                dom: 'lfrtip',

                lengthMenu: [
                    [ 10, 20,30,50,100, -1 ],
                    [ '10', '20', '30','50','100', 'All' ]
                ],
                buttons: [
                    {
                        extend:    'print',
                        text:      '<i class="fa fa-print"></i>',
                        titleAttr: 'Print',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fa fa-file-csv"></i>',
                        titleAttr: 'CSV',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }

                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        charset: "utf-8",
                        "bom": "true",
                        className: 'btn btn-xs',
                        exportOptions: {
                            columns: ':visible:not(.not-exported)',
                            modifier: {
                                search: 'applied',
                                order: 'applied',
                                page: 'all'
                            }
                        }
                    }
                ],
            });

        });
        function getProvinceDistricts(province_obj) {
            var province_id =  $(province_obj).val();
            getDistricts(province_id);
        }

        var districts = {!! isset($districts)?$districts:array() !!};

        @if(request()->get('province_id'))
        var selected_district = {{request()->get('district_id')}};
        getDistricts({{request()->get('province_id')}},selected_district);
        @endif

        function getDistricts(province_id,selected_district) {
            $('#district_id').empty();
            var newOption = new Option("--- Select ---", "", false, false);
            $('#district_id').append(newOption);
           var filter_districts = _.filter(districts,  { 'province_id': parseInt(province_id)});
            filter_districts.forEach(function (row) {
                $('#district_id').append('<option '+(selected_district==row.id?"selected":"")+' value="'+ row.id + '">' + row.district_name_e+ '</option>');
            });
            $('#district_id').trigger('change.select2');

        }

        function resetForm(){
            $('#province_id').val('').trigger('change.select2');
            $('#district_id').val('').trigger('change.select2');
            $('#business_category_id').val('').trigger('change.select2');
            $('input[name=business_registration_status_id]').prop('checked', false);
            reDrawDataTable();
        }
    </script>
@endpush
