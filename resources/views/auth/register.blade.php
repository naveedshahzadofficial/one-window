@extends('layouts.auth')
@push('title','Registration')
@section('content')

    @component('_components.alerts-default')@endcomponent
    @livewire('registration')

@endsection
