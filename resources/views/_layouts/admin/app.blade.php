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
            <meta name="keywords" content="RLCOs" />
            <meta name="description" content="RLCOs" />
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
	<body id="kt_body" class="header-fixed header-mobile-fixed  subheader-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading">

		<!--[html-partial:include:{"file":"layout.html"}]/-->
        @section('layout')
            @include('_layouts.admin.layout')
        @show

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-cart.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-panel.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/chat.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/scrolltop.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/toolbar.html"}]/-->

		<!--[html-partial:include:{"file":"partials/_extras/offcanvas/demo-panel.html"}]/-->

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
		<script src="{{ asset('assets/plugins/lodash/lodash.min.js') }}"></script>

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

            window.addEventListener('confirm:delete', event =>{
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                    if (result.value) {
                        window.livewire.emit('confirmDelete', event.detail.type, event.detail.id);
                        Swal.fire(
                            "Deleted!",
                            "Your record has been deleted.",
                            "success"
                        )
                    }
                });
            });

            window.addEventListener('page:tab', event =>{
                KTUtil.scrollTop(300,3000);
            });

        </script>

        <script>
            $(function (){
             $('.select2').select2();
            });
        </script>

        @stack('post-scripts')

        <script>
            function reDrawDataTable() {
                myDataTable.draw()
            }
            function toggleStatus(obj)
            {
                var action_url = $(obj).attr('data-href');
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Confirm",
                    closeOnConfirm: false
                }).then(function(result) {
                    if (result.value) {
                        var form = document.createElement("form");
                        form.setAttribute("method", "POST");
                        form.setAttribute("action", action_url);
                        var form_method = document.createElement("input");
                        form_method.setAttribute("type", "hidden");
                        form_method.setAttribute("name", "_method");
                        form_method.setAttribute("value", "DELETE");
                        form.appendChild(form_method);
                        // Create an input element for date of birth
                        var csrf_field = document.createElement("input");
                        csrf_field.setAttribute("type", "hidden");
                        csrf_field.setAttribute("name", "_token");
                        var csrf_token_val = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        csrf_field.setAttribute("value", csrf_token_val);
                        form.appendChild(csrf_field);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        </script>
	</body>

	<!--end::Body-->
</html>
