<!DOCTYPE html>
<!-- Version 7 -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<!--begin::Head-->
	<head>
        <base href="{{ url('/')}}">
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@stack('title','Dashboard') - @stack('app-name',config('app.name', 'Admin Panel'))</title>
        @section('metas')
            <meta name="description" content="National SME Registration Portal (SMERP)" />
        @show
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />

		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

		<!--end::Fonts-->

    @stack('pre-styles')
    @section('styles')

		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
            <!--end::Page Vendors Styles-->

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles-->

		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/brand/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/themes/layout/aside/light.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Layout Themes-->



        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" >

        <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/pikaday/pikaday.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/applicant_custom.css')}}"/>


        @show

        @livewireStyles

        @stack('post-styles')

		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
	</head>

	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed  subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

		<!--[html-partial:include:{"file":"layout.html"}]/-->
        @section('layout')
            @include('_layouts.applicant.layout')
        @show

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-cart.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-panel.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/chat.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/scrolltop.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/toolbar.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/demo-panel.html"}]/-->


        <!-- Modal-->
        <div class="modal fade" id="commonModalScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_help">Modal Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 120px;">
                       <p class="text-left" id="english_help">
                           hello english
                       </p>
                        <p class="urdu-label text-right" dir="rtl" id="urdu_help">
                            hello urdu
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-custom-color font-weight-bold" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            var BASE_URL = "{{ url('/')}}";
        </script>
        @stack('pre-scripts')

        @section('scripts')
		<script>
			var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
		</script>

		<!--begin::Global Config(global config for global JS scripts)-->
		<script>
			var KTAppSettings = {
				"breakpoints": {
					"sm": 576,
					"md": 768,
					"lg": 992,
					"xl": 1200,
					"xxl": 1400
				},
				"colors": {
					"theme": {
						"base": {
							"white": "#ffffff",
							"primary": "#3699FF",
							"secondary": "#E5EAEE",
							"success": "#1BC5BD",
							"info": "#8950FC",
							"warning": "#FFA800",
							"danger": "#F64E60",
							"light": "#E4E6EF",
							"dark": "#181C32"
						},
						"light": {
							"white": "#ffffff",
							"primary": "#E1F0FF",
							"secondary": "#EBEDF3",
							"success": "#C9F7F5",
							"info": "#EEE5FF",
							"warning": "#FFF4DE",
							"danger": "#FFE2E5",
							"light": "#F3F6F9",
							"dark": "#D6D6E0"
						},
						"inverse": {
							"white": "#ffffff",
							"primary": "#ffffff",
							"secondary": "#3F4254",
							"success": "#ffffff",
							"info": "#ffffff",
							"warning": "#ffffff",
							"danger": "#ffffff",
							"light": "#464E5F",
							"dark": "#ffffff"
						}
					},
					"gray": {
						"gray-100": "#F3F6F9",
						"gray-200": "#EBEDF3",
						"gray-300": "#E4E6EF",
						"gray-400": "#D1D3E0",
						"gray-500": "#B5B5C3",
						"gray-600": "#7E8299",
						"gray-700": "#5E6278",
						"gray-800": "#3F4254",
						"gray-900": "#181C32"
					}
				},
				"font-family": "Poppins"
			};
		</script>

		<!--end::Global Config-->

		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
		<!--end::Global Theme Bundle-->

        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{asset('assets/plugins/datetimepicker/jquery.datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/plugins/pikaday/pikaday.js')}}"></script>

        <!--end::Page Vendors-->

		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

		<!--end::Page Vendors-->

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>

		<!--end::Page Scripts-->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        @show


        @livewireScripts

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



            window.addEventListener('reinitialization:utility', event =>{
               console.log(event);
                $('#connection_date_'+event.detail.id).datetimepicker({
                    timepicker:false,
                    format:'d-m-Y',
                    formatDate:'d-m-Y',
                    scrollInput : false
                });

            });
        </script>
        <script>
    <?php
    $helps = [
        'residence_address_type'=>[
            'title'=>'Type of Property Residence Place',
            'body_e'=>'Type of Property Residence Place',
            'body_u'=>'Type of Property Residence Place',
        ],
        'residence_address_form'=>[
            'title'=>'Form of property Residence Place',
            'body_e'=>'Form of property Residence Place',
            'body_u'=>'Form of property Residence Place',
        ],
        'business_address_type'=>[
            'title'=>'Type of Property Business Place',
            'body_e'=>'Type of Property Business Place',
            'body_u'=>'Type of Property Business Place',
        ],
        'business_address_form'=>[
            'title'=>'Form of property Business Place',
            'body_e'=>'Form of property Business Place',
            'body_u'=>'Form of property Business Place',
        ],
        'business_acquisition_date'=>[
            'title'=>'Acquisition Date Business Place',
            'body_e'=>'Acquisition Date Business Place',
            'body_u'=>'Acquisition Date Business Place',
        ],
        'residence_acquisition_date'=>[
            'title'=>'Acquisition Date Residence Place',
            'body_e'=>'Acquisition Date Residence Place',
            'body_u'=>'Acquisition Date Residence Place',
        ],
        'business_sectors'=>[
            'title'=>'Sector in Business',
            'body_e'=>'Sector in Business',
            'body_u'=>'Sector in Business',
        ],
        'residential_share'=>[
            'title'=>'Share in Residence Place',
            'body_e'=>'Share in Residence Place',
            'body_u'=>'Share in Residence Place',
        ],
        'proof_of_ownership_file'=>[
            'title'=>'OwnerShip Title',
            'body_e'=>'OwnerShip Body English',
            'body_u'=>'OwnerShip Body Urdu',
        ],
        'license_registration_file'=>[
            'title'=>'registration Title',
            'body_e'=>'registration Body English',
            'body_u'=>'registration Body Urdu',
        ],
        'business_share'=>[
            'title'=>'Share in Business Place',
            'body_e'=>'Share in Business Place',
            'body_u'=>'Share in Business Place',
        ],
        'business_evidence_ownership_file'=>[
            'title'=>'Business Evidence_Ownership File',
            'body_e'=>'Business Evidence_Ownership File',
            'body_u'=>'Business Evidence_Ownership File',
        ]
    ];

    ?>
            function showHelp(index_key){
               var helps = '<?php echo  json_encode($helps); ?>';
               var json_helps = JSON.parse(helps);
                $('#title_help').text(json_helps[index_key].title);
                $('#english_help').text(json_helps[index_key].body_e);
                $('#urdu_help').text(json_helps[index_key].body_u);
                $('#commonModalScrollable').modal('show');
            }
        </script>

        @stack('post-scripts')
	</body>

	<!--end::Body-->
</html>
