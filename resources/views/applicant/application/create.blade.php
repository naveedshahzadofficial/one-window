@extends('_layouts.applicant.app')
@push('title','Applications')
@section('content')
    <div class="row">
        <div class="col-lg-12">

    <div class="card card-custom ">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">New Application</h3>
            </div>
        </div>

        <div class="card-body p-0">
            @livewire('application-form')
        </div>
    </div>

    </div>
    </div>

@endsection

@push('pre-styles')
<link href="{{ asset('assets/css/pages/wizard/wizard-3.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('post-scripts')
    {{--<script>
        // Class definition
        var KTWizard4 = function () {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizard;

            // Private functions
            var initWizard = function () {
                // Initialize form wizard
                _wizard = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: false  // allow step clicking
                });

                // Change event
                _wizard.on('change', function (wizard) {
                    KTUtil.scrollTop();
                });
            }
            return {
                // public functions
                init: function () {
                    _wizardEl = KTUtil.getById('kt_wizard_v4');
                    _formEl = KTUtil.getById('kt_form');

                    initWizard();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTWizard4.init();
        });
    </script>--}}
@endpush
