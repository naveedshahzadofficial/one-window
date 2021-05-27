
<!--begin::Main-->

		<!--[html-partial:include:{"file":"partials/_header-mobile.html"}]/-->
@section('header-mobile')
    @include('_layouts.applicant.partials._header-mobile')
@show
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--[html-partial:include:{"file":"partials/_aside.html"}]/-->
            @section('aside')
                @include('_layouts.applicant.partials._aside')
            @show

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--[html-partial:include:{"file":"partials/_header.html"}]/-->
                @section('header')
                    @include('_layouts.applicant.partials._header')
                @show

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

					<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
                    @section('subheader-v1')
                        @include('_layouts.applicant.partials._subheader.subheader-v1')
                    @show

						<!--Content area here-->
                        {{ isset($slot)?$slot:'' }}
                        @yield('content')

					</div>

					<!--end::Content-->

					<!--[html-partial:include:{"file":"partials/_footer.html"}]/-->
                    @section('footer')
                        @include('_layouts.applicant.partials._footer')
                    @show
				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->
