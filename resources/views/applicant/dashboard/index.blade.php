@extends('_layouts.applicant.app')
@push('title','Dashboard')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Dashboard</h3>
            </div>

        </div>
        <div class="card-body">
            <div class="container" style="position: relative;">
                <div id="mloader" class="m-loader m-loader--lg m-loader--success" style="z-index: 999999; height: 300px; width: 100px; position: absolute; left: 50%; margin-left: -50px; top: 50%; margin-top: -50px;"></div>
            </div>
            <div style="min-width: 310px; min-height: 400px; margin: 0 auto; margin-top: 30px;" id="smes_column_bar_graph" class="flot-chart"></div>

        </div>
    </div>
@endsection

