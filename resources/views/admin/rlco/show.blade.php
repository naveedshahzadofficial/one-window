@extends('_layouts.admin.app')
@push('title','Rlco Detail')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">{{ $rlco->rlco_name }}</h3>
            </div>
        </div>

        <div class="card-body">

            @component('_components.rlco_detail',['rlco'=>$rlco]) @endcomponent
        </div>
    </div>
    <!--end::Card-->

@endsection
