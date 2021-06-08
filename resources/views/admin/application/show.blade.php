@extends('_layouts.admin.app')
@push('title','SME Show')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">SME</h3>
            </div>
        </div>

         <div class="card-body">
            
            @component('_components.application_detail',['application'=>$application,'genders'=>$genders]) @endcomponent
         </div>
    </div>
    <!--end::Card-->

@endsection
