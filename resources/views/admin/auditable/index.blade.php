@extends('_layouts.admin.app')
@push('title','All SMEs Admin Panel')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">All Auditable</h3>
            </div>

        </div>
        <div class="card-body">
        @component('_components.alerts-default')@endcomponent

            <div class="kt-form kt-form--fit mb-15">
                <div class="row mb-6">

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Action:</label>
                        <select name="event" class="form-control select2" id="event">
                            <option value="">--- Select ---</option>
                            @isset($events)
                                @foreach($events as $event)
                            <option value="{{ $event }}">{{ $event }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-lg-3 mb-lg-0 mb-6">
                        <label>Registration No.</label>
                        <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="Registration No.">
                    </div>


                </div>
                <div class="row mt-8">


                    <div class="col-lg-9 mt-7">
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
            <div class="table-responsive">
            <table class="table table-bordered table-checkable" id="my_datatable">
                <thead>
                <tr>
                    <th>Audit ID</th>
                    <th>Sr. No.</th>
                    <th>Model</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>Time</th>
                    <th>Old Values</th>
                    <th>New Values</th>
                    <th>Url</th>
                    <th>Ip_adrress</th>
                    <th>Navegador</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
            </div>
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
                    url: '{{ route('admin.auditable.index-ajax') }}',
                    type: "POST",
                    data: function (row) {
                        row.registration_no= $('#registration_no').val();
                        row.event= $('#event').val();
                        row.district_id= $('#district_id').val();
                        row.business_category_id=$('#business_category_id').val();
                        row.business_registration_status_id=$('.business_registration_status_id:checked').val();
                    }
                },
                columns: [
                    { data: 'id',searchable: false, visible: false, printable:false  },
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'auditable_type', name: 'auditable_type'},
                    {data: 'event', name: 'event'},
                    {data: 'user_id', name: 'user_id', render:function(data,type,row,meta){
                        return row.user!=null?user.first_name:'';
                    } },
                    {data: 'created_at', name: 'created_at'},
                    {data: 'old_values', name: 'old_values'},
                    {data: 'new_values', name: 'new_values'},
                    {data: 'url', name: 'url'},
                    {data: 'ip_address', name: 'ip_address'},
                    {data: 'user_agent', name: 'user_agent'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false, searchable: false
                    },
                ],
                order: [[0, 'desc']],
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

        function resetForm(){
            $('#event').val('').trigger('change.select2');
            $('input[name=business_registration_status_id]').prop('checked', false);
            reDrawDataTable();
        }
    </script>
@endpush
