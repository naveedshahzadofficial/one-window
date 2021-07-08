
    @if(optional($registration->application)->id && auth()->guard('admin')->check())
    @livewire('status-form',['registration' => $registration])
    @endif

    <h4 class="main_section_heading">{!! __('labels.review_applicant_profile') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span></h4>

    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.first_name') !!}</span>
                <span class="opacity-70">{{ isset($registration->prefix->prefix_name)?$registration->prefix->prefix_name:'' }} {{ isset($registration['first_name'])?$registration['first_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.middle_name') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['middle_name'])?$registration['middle_name']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.last_name') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['last_name'])?$registration['last_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.gender') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->gender->gender_name)?$registration->gender->gender_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['cnic_no'])?$registration['cnic_no']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_issue_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['cnic_issue_date'])?$registration['cnic_issue_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_expiry_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['cnic_expiry_date'])?$registration['cnic_expiry_date']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.date_of_birth') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['date_of_birth'])?$registration['date_of_birth']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.designation_business') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->designationBusiness->name)?$registration->designationBusiness->name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div
                class="d-flex flex-column flex-root @if(isset($registration->minorityStatusQuestion->name) && $registration->minorityStatusQuestion->name=='No') d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.minority_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->minorityStatus->name)?$registration->minorityStatus->name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root @if(isset($registration->minorityStatus->name) && $registration->minorityStatus->name=='Other') d-box @else d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.other_than_minority') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['minority_status_other'])?$registration['minority_status_other']:'' }}</span>
            </div>


        </div>

        @if(optional($registration->disabilityQuestion)->name=='Yes')
        <div class="row pt-5">
            <table class="table">
                <head>
                    <tr>
                        <th>{!! __('labels.disability') !!}</th>
                        <th class="text-center">{!! __('labels.disability_certificate') !!}</th>
                    </tr>
                </head>
                <tbody>
                @foreach($registration->disabilities as $index=>$disability)
                    @if(isset($disability->disability_certificate_file) && !empty($disability->disability_certificate_file))
                        <tr>
                            <td>{{ optional($disability->disability)->disability_name_e }}</td>
                            <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($disability->disability_certificate_file) }}"
                                                        target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        @endif


        <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">{!! __('labels.active_taxpayer') !!}</span>
                    <span
                        class="opacity-70">{{ optional($registration->activeTaxpayerQuestion)->name }}</span>
                </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.national_tax_number') !!}<span
                                        class="text-danger"></span></span>
                <span class="opacity-70">{{ isset($registration['ntn_personal'])?$registration['ntn_personal']:'' }}</span>
            </div>

        </div>


        </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.qualification_details') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.education_level') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->educationLevel->name)?$registration->educationLevel->name:'' }}</span>
            </div>
        </div>
        @if(isset($registration->technicalEducations) && $registration->technicalEducations->isNotEmpty())
        @foreach($registration->technicalEducations as $index=>$education)
            <div
                :class="{'d-none-imp': is_technical_education=='No'}"
                class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.technical_education_detail') !!}</span>
                    <span
                        class="opacity-70">{{ isset($education['certificate_title'])?$education['certificate_title']:'' }}</span>
                </div>
            </div>
        @endforeach
        @endif
        <div class="d-flex justify-content-between pt-5">
            <div
                class="d-flex flex-column flex-root @if(isset($registration->skilledWorkerQuestion->name) && $registration->skilledWorkerQuestion->name=='No') d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.is_skilled_worker') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['skill_or_art'])?$registration['skill_or_art']:'' }}</span>
            </div>
        </div>
    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.residence_address') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceAddressType->type_name)?$registration->residenceAddressType->type_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceAddressForm->form_name)?$registration->residenceAddressForm->form_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_1') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['residence_address_1'])?$registration['residence_address_1']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_2') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['residence_address_2'])?$registration['residence_address_2']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_3') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['residence_address_3'])?$registration['residence_address_3']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
								<span class="font-weight-bolder mb-2">{!! __('labels.province') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceProvince->province_name)?$registration->residenceProvince->province_name:'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceCity->city_name_e)?$registration->residenceCity->city_name_e:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceDistrict->district_name_e)?$registration->residenceDistrict->district_name_e:'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">

            <div class="d-flex flex-column flex-root">
															<span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceTehsil->tehsil_name_e)?$registration->residenceTehsil->tehsil_name_e:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->residenceAddressCapacity->capacity_name)?$registration->residenceAddressCapacity->capacity_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_percentage') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['residence_share'])?$registration['residence_share']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_acquisition_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['residence_acquisition_date'])?$registration['residence_acquisition_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.mobile_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['personal_mobile_no'])?$registration['personal_mobile_no']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.email_address') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['personal_email'])?$registration['personal_email']:'' }}</span>
            </div>
        </div>
    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.review_business_profile') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_name') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_name'])?$registration['business_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_start_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_establishment_date'])?$registration['business_establishment_date']:'' }}</span>
            </div>

        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessRegistrationStatus->name)?$registration->businessRegistrationStatus->name:'' }}</span>
            </div>
        </div>
        <div
            class="d-flex justify-content-between pt-5 @if(isset($registration->businessRegistrationStatus->name) && $registration->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_legal_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessLegalStatus->legal_name)?$registration->businessLegalStatus->legal_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_registration_number'])?$registration['business_registration_number']:'' }}</span>
            </div>

        </div>
        <div
            class="d-flex justify-content-between pt-5 @if(isset($registration->businessRegistrationStatus->name) && $registration->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_registration_date'])?$registration['business_registration_date']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_ntn_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_ntn_no'])?$registration['business_ntn_no']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_category') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessCategory->category_name)?$registration->businessCategory->category_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessActivity->group_name)?$registration->businessActivity->group_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sub_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessActivity->class_name)?$registration->businessActivity->class_name:'' }}</span>
            </div>
        </div>
    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.relevent_attachment') !!}</span></h4>
    <div class="section_box">
        <table class="table">
            <head>
                <tr>
                    <th>{!! __('labels.document_title') !!}</th>
                    <th class="text-center">{!! __('labels.download') !!}</th>
                </tr>
            </head>
            <tbody>
            @if(isset($registration['proof_of_ownership_file']) && !empty($registration['proof_of_ownership_file']))
                <tr>
                    <td>{!! __('labels.ownership_proof') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($registration['proof_of_ownership_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($registration['license_registration_file']) && !empty($registration['license_registration_file']))
                <tr>
                    <td>{!! __('labels.registration_proof') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($registration['license_registration_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($registration['registration_certificate_file']) && !empty($registration['registration_certificate_file']))
                <tr class="d-box @if(isset($registration->businessRegistrationStatus->name) && $registration->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
                    <td>{!! __('labels.registration_certificate') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($registration['registration_certificate_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($registration->otherDocuments) && $registration->otherDocuments->isNotEmpty())
                @foreach($registration->otherDocuments as $other_file)
                    @if(isset($other_file['document_file']) && !empty($other_file['document_file']))
                        <tr>
                            <td>{{ isset($other_file['document_title'])?$other_file['document_title']:'' }}</td>
                            <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($other_file['document_file']) }}"
                                    target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.business_address') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessAddressType->type_name)?$registration->businessAddressType->type_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_form') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessAddressForm->form_name)?$registration->businessAddressForm->form_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_1') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_address_1'])?$registration['business_address_1']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_2') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_address_2'])?$registration['business_address_2']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_3') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_address_3'])?$registration['business_address_3']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.province') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessProvince->province_name)?$registration->businessProvince->province_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessCity->city_name_e)?$registration->businessCity->city_name_e:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessDistrict->district_name_e)?$registration->businessDistrict->district_name_e:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessTehsil->tehsil_name_e)?$registration->businessTehsil->tehsil_name_e:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->businessCapacity->capacity_name)?$registration->businessCapacity->capacity_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_business_place') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_share'])?$registration['business_share']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_date_place') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_acquisition_date'])?$registration['business_acquisition_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            @if(isset($registration['business_evidence_ownership_file']) && !empty($registration['business_evidence_ownership_file']))
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_evidence_tenancy') !!}</span>
                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($registration['business_evidence_ownership_file']) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
                            </span>
                </div>
            @endif

        </div>
        <div class="d-flex justify-content-between pt-5">

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_contact_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_contact_number'])?$registration['business_contact_number']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_email_address') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['business_email'])?$registration['business_email']:'' }}</span>
            </div>
        </div>
    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.utility_connections_heading') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.utility_connections_detail') !!}</span></h4>
    <div class="section_box">

        @if(isset($registration->utilityConnections) && $registration->utilityConnections->isNotEmpty())
        @foreach($registration->utilityConnections as $index=>$connection)
            <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_utility') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection->utilityForm->form_name)?$connection->utilityForm->form_name:'' }}</span>
                </div>

            </div>

            <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_connection') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection->utilityType->type_name)?$connection->utilityType->type_name:'' }}</span>
                </div>

                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.connection_ownership') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection->connectionOwnership->ownership_name)?$connection->connectionOwnership->ownership_name:'' }}</span>
                </div>


            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.consumer_number') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection['utility_consumer_number'])?$connection['utility_consumer_number']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.service_provider') !!}</span>
                    <span
                        class="opacity-70">{{ optional($connection->utilityServiceProvider)->provider_name }}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.connection_date') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection['connection_date'])?$connection['connection_date']:'' }}</span>
                </div>

                @if(isset($connection['bill_file']) && !empty($connection['bill_file']))
                    <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_paid_bill_file') !!}</span>
                        <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($connection['bill_file']) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
                            </span>
                    </div>
                @endif

            </div>
        @endforeach
        @endif
    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.employee_info_heading') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.employee_info_detail') !!}</span></h4>
    <div class="section_box">

        @if(isset($registration->employeeInfos) && $registration->employeeInfos->isNotEmpty())
            @foreach($registration->employeeInfos as $employee)
                <h6 class="mb-4 mt-5 font-weight-bold text-dark">{{ isset($employee->employeeType->type_name)?$employee->employeeType->type_name:'' }}
                    &nbsp;(<span class="urdu-label"
                                 dir="rtl"> {{ isset($employee->employeeType->type_name_u)?$employee->employeeType->type_name_u:'' }} </span>)
                </h6>
                <div class="d-flex justify-content-between pt-5">
                    @foreach($genders as $gender)
                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">{{ $gender->gender_name }} (<span
                                                    class="urdu-label" dir="rtl"> {{ $gender->gender_name_u }} </span>)</span>
                            <span
                                class="opacity-70">{{ isset($employee[strtolower($gender->gender_name)])?$employee[strtolower($gender->gender_name)]:'' }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif

    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.turnover_heading') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.estimated_annual_turnover') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->turnoverFiscalYear->year_name)?$registration->turnoverFiscalYear->year_name:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.annual_turnover_fiscal_year') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['annual_turnover'])?number_format($registration['annual_turnover']):'' }}</span>
            </div>
        </div>

        <div class="d-flex justify-content-between pt-5">

            @if(isset($registration['business_account_statement_file']) && !empty($registration['business_account_statement_file']))
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_account_statement') !!}</span>
                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($registration['business_account_statement_file']) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
                            </span>
                </div>
            @endif

        </div>

    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.exports') !!}</span></h4>
    <div class="section_box">

        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->exportFiscalYear->year_name)?$registration->exportFiscalYear->year_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->exportCurrency->currency_name)?$registration->exportCurrency->currency_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.export_turnover') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['export_annual_turnover'])?number_format($registration['export_annual_turnover']):'' }}</span>
            </div>
        </div>

    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.imports') !!}</span></h4>
    <div class="section_box">



        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->importFiscalYear->year_name)?$registration->importFiscalYear->year_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration->importCurrency->currency_name)?$registration->importCurrency->currency_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.import_turnover') !!}</span>
                <span
                    class="opacity-70">{{ isset($registration['import_annual_turnover'])?number_format($registration['import_annual_turnover']):'' }}</span>
            </div>
        </div>



    </div>

