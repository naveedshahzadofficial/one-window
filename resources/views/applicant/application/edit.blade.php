@extends('_layouts.applicant.app')
@push('title','New Registration')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">UPDATE REGISTRATION</h3>
                    </div>
                </div>

                <div class="card-body p-0">
                    @livewire('application-form', ['registration'=>$application])
                </div>
            </div>

        </div>
    </div>

@endsection

@push('pre-styles')
    <link href="{{ asset('assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('post-scripts')
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "3000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        window.addEventListener('toastr:message', event =>{
            switch (event.detail.type){
                case 'success':
                    toastr.success(event.detail.title);
                    break;
                default:
                    toastr.info(event.detail.title);
                    break;
            }

        });
        window.addEventListener('page:tab', event =>{
            KTUtil.scrollTop(300,3000);
        });

        window.addEventListener('child:select2', event =>{
            let child_id = event.detail.child_id;
            $(child_id).empty();
            var newOption = new Option("--- Please Select ---", "", false, false);
            $(child_id).append(newOption);
            event.detail.data.forEach(function(row){
                $(child_id).append('<option value="'+row.id+'">'+row[event.detail.field_name]+'</option>');
            });
            $(child_id).trigger('change.select2');

        });

    </script>
@endpush
