@extends('_layouts.admin.app')
@push('title','Permits')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Permits</h3>
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
                    New Permit</a>
                <!--end::Button-->
            </div>

        </div>
        <div class="card-body">
            @component('_components.alerts-default')@endcomponent

            <div class="kt-form kt-form--fit mb-15">
                <div class="row mb-6">

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Department:</label>
                        <select name="department_id" class="form-control select2" id="department_id">
                            <option value="">--- Select ---</option>
                            @isset($departments)
                                @foreach($departments as $department)
                                    <option
                                        {{ request()->get('department_id')==$department->id?'selected':'' }} value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            @endisset
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

                    <div class="col-lg-6 mt-7">
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
                    <th>Permit ID</th>
                    <th>Sr. No.</th>
                    <th>Permit Name</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th style="width: 90px;" class="text-center">Action</th>
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
                    url: '{{ route('admin.rlcos.index-ajax') }}',
                    type: "POST",
                    data: function (row) {
                        row.registration_no = $('#registration_no').val();
                        row.department_id = $('#department_id').val();
                        row.business_category_id = $('#business_category_id').val();
                    }
                },
                columns: [
                    {data: 'id', searchable: false, visible: false, printable: false},
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'rlco_name', name: 'rlco_name'},
                    {data: 'department_name', name: 'department_id'},
                    {data: 'rlco_status', name: 'status_id'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class:'text-center'},
                ],
                order: [[0, 'desc']],
                dom: 'lfrtip',

                lengthMenu: [
                    [10, 20, 30, 50, 100, -1],
                    ['10', '20', '30', '50', '100', 'All']
                ],
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
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
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-csv"></i>',
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
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
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
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i>',
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

        function resetForm() {
            $('#business_category_id').val('').trigger('change.select2');
            reDrawDataTable();
        }
    </script>
@endpush

