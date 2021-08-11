@extends('_layouts.admin.app')
@push('title','Add Activity')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card card-custom ">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{ $activity->activity_name  }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="btn btn-circle btn-sm border-0 cursor-move active {{ $activity->activity_status=='1'?'btn-hover-success':'btn-hover-danger' }} ">
                            {{ $activity->getActivityStatus()  }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @component('_components.alerts-default')@endcomponent

                    @if(!empty($activity->activity_remark))
                    <div class="form-body col-xl-12 col-xs-12">
                        <div class="col-lg-12">
                            <strong>Remarks</strong>
                            <label class="bmd-label-floating">{{ $activity->activity_remark }}</label><br>
                        </div>
                    </div>
                    @endif

                    @livewire('activity-business-form',['activity_id'=>$activity->id])

            </div>

        </div>
    </div>
@endsection
