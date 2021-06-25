
<!--begin::Header-->
										<div class="d-flex align-items-center p-8 rounded-top">

											<!--begin::Symbol-->
											{{--<div class="symbol symbol-md bg-light-primary mr-3 flex-shrink-0">
												<img src="{{ asset('assets/media/users/300_21.jpg') }}" alt="" />
											</div>--}}

											<!--end::Symbol-->

											<!--begin::Text-->
											<div class="text-custom-color m-0 flex-grow-1 mr-3 font-size-h5">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</div>

											<!--end::Text-->
										</div>
										<div class="separator separator-solid"></div>

										<!--end::Header-->

										<!--begin::Nav-->
										<div class="navi navi-spacer-x-0 pt-5">

											<!--begin::Item-->
										{{--	<a href="javascript:;" class="navi-item px-8">
												<div class="navi-link">
													<div class="navi-icon mr-2">
														<i class="flaticon2-calendar-3 text-success"></i>
													</div>
													<div class="navi-text">
														<div class="font-weight-bold">My Profile</div>
														<div class="text-muted">Account settings and more
															<span class="label label-light-danger label-inline font-weight-bold">update</span>
														</div>
													</div>
												</div>
											</a>--}}

											<!--end::Item-->



											<!--begin::Footer-->
										{{--	<div class="navi-separator mt-3"></div>--}}
											<div class="navi-footer px-8 py-5">
                                                <a class="btn btn-custom-color font-weight-bold" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Sign Out') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>

											</div>

											<!--end::Footer-->
										</div>

										<!--end::Nav-->
