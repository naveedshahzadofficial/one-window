@extends('_layouts.frontend.app')
@section('content')

    <!-- grid starts for select options -->
    @livewire('search-rlco',['department_id'=>request()->get('department_id'),'business_category_id'=>request()->get('business_category_id'),'activity_id'=>request()->get('activity_id')])
    <!-- grid end for select options  -->

@endsection
