<h4 class="main_section_heading">{!! __('BASIC INFO') !!}</h4>
<div class="section_box">

    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Department Name') !!}</span>
            <span
                class="opacity-70">{{ optional($rlco->department)->department_name }}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('RLCOs Name') !!}</span>
            <span class="opacity-70">{{ $rlco->rlco_name }}</span>
        </div>
    </div>

    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Description') !!}</span>
            <span
                class="opacity-70">{!! $rlco->description  !!}</span>
        </div>
    </div>


    <div class="d-flex justify-content-between pt-5">

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Scope') !!}</span>
            <span
                class="opacity-70">{{ $rlco->scope }}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Business Category/ Section') !!}</span>
            <span
                class="opacity-70">{{ optional($rlco->businessCategory)->category_name }}</span>
        </div>
    </div>

    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Type of business is this applicable for') !!}</span>
            <span
                class="opacity-70">{{ $rlco->generic_sector }}</span>
        </div>
    </div>

    @if($rlco->businessActivities->isNotEmpty() && $rlco->generic_sector=="Specific")
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Sectors') !!}</span>
            <table class="table">
                <tr>
                    <th>Sr. No.</th>
                    <th>Section Name</th>
                    <th>Division Name</th>
                    <th>Group Name</th>
                    <th>Class Name</th>
                </tr>
                <tbody>
                @foreach($rlco->businessActivities as $activity)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->section_name }}</td>
                    <td>{{ $activity->division_name }}</td>
                    <td>{{ $activity->group_name }}</td>
                    <td>{{ $activity->class_name }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if($rlco->activities->isNotEmpty())
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Activities') !!}</span>
            <table class="table">
                <tr>
                    <th>Sr. No.</th>
                    <th>Title</th>
                </tr>
                <tbody>
                @foreach($rlco->activities as $activity)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->activity_name }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Title of Law') !!}</span>
            <span
                class="opacity-70">{{ $rlco->title_of_law }}</span>
        </div>
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Link of Law') !!}</span>
            <span
                class="opacity-70">{{ $rlco->link_of_law }}</span>
        </div>
    </div>


    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Automation Status') !!}</span>
            <span
                class="opacity-70">{{ $rlco->automation_status }}</span>
        </div>
    </div>


</div>

@if($rlco->automation_status!="No Information")

<h4 class="main_section_heading">{!! __('PROCESS') !!}</h4>
<div class="section_box">

    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Fee') !!}</span>
            <span
                class="opacity-70">{{ $rlco->fee }}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Fee Submission Mode') !!}</span>
            <span
                class="opacity-70">{{ $rlco->fee_submission_mode }}</span>
        </div>

    </div>

    <div class="d-flex justify-content-between pt-5">
        @if($rlco->fee_submission_mode=='Online')
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Payment Source') !!}</span>
            <span
                class="opacity-70">{{ $rlco->payment_source }}</span>
        </div>
        @endif

        @if(!empty($rlco->challan_form_file) && $rlco->fee_submission_mode=='Challan')
                @if(!empty($rlco->challan_form_file))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">{!! __('Challan form') !!}</span>
                        <span class="opacity-70">
								<a href="{{ \Illuminate\Support\Facades\Storage::url($rlco->challan_form_file) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
							</span>
                    </div>
                @endif
         @endif

    </div>

    @if($rlco->renewal_required=='Yes')
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Validity') !!}</span>
            <span
                class="opacity-70">{{ $rlco->validity }}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Renewal Fee') !!}</span>
            <span
                class="opacity-70">{{ $rlco->renewal_fee }}</span>
        </div>

    </div>
    @endif


    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Time Taken') !!}</span>
            <span
                class="opacity-70">{{ $rlco->time_taken }}</span>
        </div>

    </div>

    @if(!empty($rlco->process_flow_diagram_file))
    <div class="d-flex justify-content-between pt-5">
         @if(!empty($rlco->process_flow_diagram_file))
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">{!! __('Process Flow Diagram') !!}</span>
                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($rlco->process_flow_diagram_file) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
                            </span>
                </div>
          @endif
    </div>
    @endif

    @if($rlco->requiredDocuments->isNotEmpty())
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Required Documents') !!}</span>
                <table class="table">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Title</th>
                    </tr>
                    <tbody>
                    @foreach($rlco->requiredDocuments as $document)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $document->document_title }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($rlco->automation_status=='Fully Automated')
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Automated System Link') !!}</span>
            <span
                class="opacity-70">{{ $rlco->automated_system_link }}</span>
        </div>

    </div>
    @endif

    @if(!empty($rlco->application_form_file) && $rlco->automation_status=='Semi Automated')
            <div class="d-flex justify-content-between pt-5">
                @if(!empty($rlco->application_form_file))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">{!! __('Application Form') !!}</span>
                        <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($rlco->application_form_file) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
                            </span>
                    </div>
                @endif

            </div>
    @endif
</div>

<h4 class="main_section_heading">{!! __('Dependencies') !!}</h4>
<div class="section_box">

    @if($rlco->dependencies->isNotEmpty())
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Dependencies') !!}</span>
                <table class="table">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Organization</th>
                        <th>Activity name</th>
                        <th>Priority</th>
                        <th>Remarks</th>
                    </tr>
                    <tbody>
                    @foreach($rlco->dependencies as $dependency)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($dependency->department)->department_name }}</td>
                            <td>{{ $dependency->activity_name }}</td>
                            <td>{{ $dependency->priority }}</td>
                            <td>{!! $dependency->remark !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <span>No, dependency is available.</span>
    @endif

</div>

<h4 class="main_section_heading">{!! __('INSPECTIONS') !!}</h4>
<div class="section_box">
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __('Inspection') !!}</span>
            <span
                class="opacity-70">{{ $rlco->inspection_required }}</span>
        </div>
    </div>

    @if($rlco->inspection_required!="None")


        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Mode of Inspection') !!}</span>
                <span
                    class="opacity-70">{{ $rlco->mode_of_inspection }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Joint inspection with') !!}</span>
                <span
                    class="opacity-70">{{ optional($rlco->inspectionDepartment)->department_name }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Fine Details') !!}</span>
                <span
                    class="opacity-70">{!! $rlco->fine_details !!}</span>
            </div>

        </div>


    @endif
</div>


<h4 class="main_section_heading">{!! __('FAQs') !!}</h4>
<div class="section_box">

    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFaqs">
        @forelse($rlco->faqs as $faq)
        <div class="card bg-custom-color">
            <div class="card-header" id="heading_faq_{{$loop->iteration}}">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_faq_{{$loop->iteration}}" aria-expanded="false">
																<span class="svg-icon svg-icon-primary">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
																			<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                    <div class="card-label pl-4">{{ $faq->faq_question }}</div>
                    @if(!empty($faq->faq_file))
                        <a  href="{{ asset('storage/'.$faq->faq_file) }}" target="_blank" title="Attachment Faq" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a>&nbsp;&nbsp;
                    @endif
                </div>
            </div>
            <div id="collapse_faq_{{$loop->iteration}}" class="collapse" data-parent="#accordionFaqs" style="">
                <div class="card-body pl-12">{!! $faq->faq_answer !!}</div>
            </div>
        </div>
            @empty
                <span class="opacity-70">No, Faqs is available.</span>
        @endforelse
    </div>

</div>


<h4 class="main_section_heading">{!! __('Observations') !!}</h4>
<div class="section_box">

    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionFoss">
        @forelse($rlco->foss as $fos)
            <div class="card bg-custom-color">
                <div class="card-header" id="heading_fos_{{$loop->iteration}}">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_fos_{{$loop->iteration}}" aria-expanded="false">
																<span class="svg-icon svg-icon-primary">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
																			<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
                        <div class="card-label pl-4">{{ $fos->fos_observation }}</div>
                        @if(!empty($fos->fos_file))
                            <a  href="{{ asset('storage/'.$fos->fos_file) }}" target="_blank" title="Attachment FOS" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a>&nbsp;&nbsp;
                        @endif
                    </div>
                </div>
                <div id="collapse_fos_{{$loop->iteration}}" class="collapse" data-parent="#accordionFoss" style="">
                    <div class="card-body pl-12">{!! $fos->fos_solution !!}</div>
                </div>
            </div>
        @empty
          <span class="opacity-70">No, observation is available.</span>
        @endforelse
    </div>

</div>

<h4 class="main_section_heading">{!! __('Other Documents') !!}</h4>
<div class="section_box">
    @if($rlco->otherDocuments->isNotEmpty())
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('Other Documents') !!}</span>
                <table class="table">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Title</th>
                        <th class="text-center">Attachment</th>
                    </tr>
                    <tbody>
                    @foreach($rlco->otherDocuments as $document)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $document->document_title }}</td>
                            <td class="text-center"><a  href="{{ asset('storage/'.$document->document_file) }}" target="_blank" title="{{ $document->document_title }} attachment" class="btn btn-info text-center btn-circle btn-icon btn-xs"><i class="flaticon2-file text-white"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <span>No, other document is available.</span>
    @endif
</div>
@else
<h4 class="main_section_heading">{!! __('No Information') !!}</h4>
<div class="section_box">
    <div class="d-flex justify-content-between pt-5">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{!! __("Contact Detail / Department office address Detail") !!}</span>
            <span
                class="opacity-70">{{ $rlco->manual_detail }}</span>
        </div>
    </div>
</div>
@endif
