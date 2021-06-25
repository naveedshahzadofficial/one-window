<!--begin: Wizard Step 7 -->
<div class="pb-5" data-wizard-type="step-content"
     data-wizard-state="@if($step==6){{ 'current' }}@else{{ 'done' }}@endif">

    <h4 class="font-weight-bold section_heading text-white"><span>  {!!  __('labels.submission_info_heading') !!}</span></h4>
    <div class="section_box">
        @if(!($tab_applicant_profile_is_completed && $tab_business_profile_is_completed &&
                        $tab_utility_connection_is_completed && $tab_employees_info_is_completed &&
                        $tab_annual_turnover_is_completed))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        Please fill all the required fields in all tabs.
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div @if(!$tab_applicant_profile_is_completed) class="bg-white" @endif>
                    <div class="card card-custom wave wave-animate-slow {{ $tab_applicant_profile_is_completed?'wave-success':'wave-danger' }}">
                        <div class="card-body bg-transparent">
                            <div class="d-flex align-items-center py-5">
                                <div class="mr-6">
                                    @if($tab_applicant_profile_is_completed)
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @else

                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @endif

                                </div>
                                <div class="d-flex flex-column">
                                    <a wire:click.prevent="$set('step', 0)" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left" href="javascript:;" class="text-dark text-hover-primary font-weight-bold font-size-md mb-3">{!! __('labels.applicant_profile') !!}</a>
                                    <div class="text-dark-75">{{ $tab_applicant_profile_is_completed?'Completed':'In Completed' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$tabsProgress['applicant_percentage']==100?'bg-success':'bg-danger'}}" role="progressbar" style="width: {{$tabsProgress['applicant_percentage']}}%; height: 15px;" aria-valuenow="{{$tabsProgress['applicant_percentage']}}" aria-valuemin="0" aria-valuemax="100">{{$tabsProgress['applicant_percentage']}}%</div>
                </div>
            </div>
            <div class="col-md-4">
                <div @if(!$tab_business_profile_is_completed) class="bg-white" @endif>
                    <div class="card card-custom wave wave-animate-slow {{ $tab_business_profile_is_completed?'wave-success':'wave-danger' }}">
                        <div class="card-body bg-transparent">
                            <div class="d-flex align-items-center py-5">
                                <div class="mr-6">
                                    @if($tab_business_profile_is_completed)
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @else

                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @endif

                                </div>
                                <div class="d-flex flex-column">
                                    <a wire:click.prevent="$set('step', 1)" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left" href="javascript:;" class="text-dark text-hover-primary font-weight-bold font-size-md mb-3">{!! __('labels.business_profile') !!}</a>
                                    <div class="text-dark-75">{{ $tab_business_profile_is_completed?'Completed':'In Completed' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$tabsProgress['business_percentage']==100?'bg-success':'bg-danger'}}" role="progressbar" style="width: {{$tabsProgress['business_percentage']}}%; height: 15px;" aria-valuenow="{{$tabsProgress['business_percentage']}}" aria-valuemin="0" aria-valuemax="100">{{$tabsProgress['business_percentage']}}%</div>
                </div>
            </div>
            <div class="col-md-4">
                <div @if(!$tab_utility_connection_is_completed) class="bg-white" @endif>
                    <div class="card card-custom wave wave-animate-slow  {{ $tab_utility_connection_is_completed?'wave-success':'wave-danger' }}">
                        <div class="card-body bg-transparent">
                            <div class="d-flex align-items-center py-5">
                                <div class="mr-6">
                                    @if($tab_utility_connection_is_completed)
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @else

                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <a wire:click.prevent="$set('step', 2)" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left" href="javascript:;" class="text-dark text-hover-primary font-weight-bold font-size-md mb-3">{!! __('labels.utility_connections') !!}</a>
                                    <div class="text-dark-75">{{ $tab_utility_connection_is_completed?'Completed':'In Completed' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$tabsProgress['utility_percentage']==100?'bg-success':'bg-danger'}}" role="progressbar" style="width: {{$tabsProgress['utility_percentage']}}%; height: 15px;" aria-valuenow="{{$tabsProgress['utility_percentage']}}" aria-valuemin="0" aria-valuemax="100">{{$tabsProgress['utility_percentage']}}%</div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-4">
                <div @if(!$tab_employees_info_is_completed) class="bg-white" @endif>
                    <div class="card card-custom wave wave-animate-slow {{ $tab_employees_info_is_completed?'wave-success':'wave-danger' }}">
                        <div class="card-body bg-transparent">
                            <div class="d-flex align-items-center py-5">
                                <div class="mr-6">
                                    @if($tab_employees_info_is_completed)
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @else

                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <a wire:click.prevent="$set('step', 3)" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left" href="javascript:;" class="text-dark text-hover-primary font-weight-bold font-size-md mb-3">{!! __('labels.employees_info') !!}</a>
                                    <div class="text-dark-75">{{ $tab_employees_info_is_completed?'Completed':'In Completed' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$tabsProgress['employee_percentage']==100?'bg-success':'bg-danger'}}" role="progressbar" style="width: {{$tabsProgress['employee_percentage']}}%; height: 15px;" aria-valuenow="{{$tabsProgress['employee_percentage']}}" aria-valuemin="0" aria-valuemax="100">{{$tabsProgress['employee_percentage']}}%</div>
                </div>
            </div>
            <div class="col-md-4">
                <div @if(!$tab_annual_turnover_is_completed) class="bg-white" @endif>
                    <div class="card card-custom wave wave-animate-slow {{ $tab_annual_turnover_is_completed?'wave-success':'wave-danger' }}">
                        <div class="card-body bg-transparent">
                            <div class="d-flex align-items-center py-5">
                                <div class="mr-6">
                                    @if($tab_annual_turnover_is_completed)
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @else

                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
<path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
</g>
</svg><!--end::Svg Icon--></span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <a wire:click.prevent="$set('step', 4)" wire:loading.attr="disabled" wire:loading.class="spinner spinner-white spinner-left" href="javascript:;" class="text-dark text-hover-primary font-weight-bold font-size-md mb-3">{!! __('labels.annual_turnover') !!}</a>
                                    <div class="text-dark-75"> {{ $tab_annual_turnover_is_completed?'Completed':'In Completed' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$tabsProgress['turnover_percentage']==100?'bg-success':'bg-danger'}}" role="progressbar" style="width: {{$tabsProgress['turnover_percentage']}}%; height: 15px;" aria-valuenow="{{$tabsProgress['turnover_percentage']}}" aria-valuemin="0" aria-valuemax="100">{{$tabsProgress['turnover_percentage']}}%</div>
                </div>
            </div>
        </div>


        <div class="row form-group mt-20">
            <div class="col-md-12 col-form-label">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                        <input wire:model.defer="accept_declaration" type="checkbox" name="declare_applicant_name">
                        <span></span>
                        <p class="declare_notion mb-0">I&nbsp;<span id="declare_applicant_name">{{ isset($application['first_name'])?$application['first_name']:'' }}{{ isset($application['middle_name']) && !empty($application['middle_name'])?' '.$application['middle_name']:'' }}{{ isset($application['last_name']) && !empty($application['last_name'])?' '.$application['last_name']:'' }}</span>, do hereby solemnly, and sincerely declare that the information provided in the form and its enclosure is:</p>
                    </label>
                </div>
                @error('accept_declaration')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <p class="d-inline urdu-label ml-10" style="direction:rtl">میں حلفاََ بیان کرتا /کرتی ہوں کہ درخواست فارم میں دی گئی معلومات:</p>
            </div>

            <div class="col-md-12">
                <ol class="mt-3">
                    <li>
                        <p class="mb-0">True and correct to the best of my knowledge and nothing has been concealed; and</p>
                        <p class="d-inline urdu-label" style="direction:rtl">میرے علم کے مطابق بالکل سہی، درست اور سچی ہیں اور کوئی بات پوشیدہ نہیں رکھی گئی۔</p>
                    </li>
                    <li>
                        <p class="mb-0">In case of any forgery and/or concealment of any fact/ document is found, the same shall lead to the initiation of legal proceedings as per law, policy and rules.</p>
                        <p class="d-inline urdu-label" style="direction:rtl"> کسی کاغذ/ معلومات میں میری طرف سے غیر قانونی تبدیلی یا اسے چھپانے کی صورت میں میرے خلاف قانون و قواعد اور پالیسی کے مطابق کاروائی کی جا سکتی ہے۔</p>
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
<!--end: Wizard Step 7 -->
