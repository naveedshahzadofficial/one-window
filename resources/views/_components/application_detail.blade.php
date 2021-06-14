
    <h4 class="main_section_heading">{!! __('labels.review_applicant_profile') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span></h4>

    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.first_name') !!}</span>
                <span class="opacity-70">{{ isset($application->prefix->prefix_name)?$application->prefix->prefix_name:'' }} {{ isset($application['first_name'])?$application['first_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.middle_name') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['middle_name'])?$application['middle_name']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.last_name') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['last_name'])?$application['last_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.gender') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->gender->gender_name)?$application->gender->gender_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['cnic_no'])?$application['cnic_no']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_issue_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['cnic_issue_date'])?$application['cnic_issue_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_expiry_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['cnic_expiry_date'])?$application['cnic_expiry_date']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.date_of_birth') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['date_of_birth'])?$application['date_of_birth']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.designation_business') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->designationBusiness->name)?$application->designationBusiness->name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div
                class="d-flex flex-column flex-root @if(isset($application->minorityStatusQuestion->name) && $application->minorityStatusQuestion->name=='No') d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.minority_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->minorityStatus->name)?$application->minorityStatus->name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root @if(isset($application->minorityStatus->name) && $application->minorityStatus->name=='Other') d-box @else d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.other_than_minority') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.national_tax_number') !!}<span
                                        class="text-danger"></span></span>
                <span
                    class="opacity-70">{{ isset($application['ntn_personal'])?$application['ntn_personal']:'' }}</span>
            </div>

        </div>
    </div>

    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.qualification_details') !!}</span></h4>
    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.education_level') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->educationLevel->name)?$application->educationLevel->name:'' }}</span>
            </div>
        </div>
        @if(isset($application->technicalEducations) && $application->technicalEducations->isNotEmpty())
        @foreach($application->technicalEducations as $index=>$education)
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
                class="d-flex flex-column flex-root @if(isset($application->skilledWorkerQuestion->name) && $application->skilledWorkerQuestion->name=='No') d-none-imp @endif">
                                <span class="font-weight-bolder mb-2">{!! __('labels.is_skilled_worker') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['skill_or_art'])?$application['skill_or_art']:'' }}</span>
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
                    class="opacity-70">{{ isset($application->residenceAddressType->type_name)?$application->residenceAddressType->type_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceAddressForm->form_name)?$application->residenceAddressForm->form_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_1') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_address_1'])?$application['residence_address_1']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_2') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_address_2'])?$application['residence_address_2']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_3') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_address_3'])?$application['residence_address_3']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
								<span class="font-weight-bolder mb-2">{!! __('labels.province') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceProvince->province_name)?$application->residenceProvince->province_name:'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceCity->city_name_e)?$application->residenceCity->city_name_e:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceDistrict->district_name_e)?$application->residenceDistrict->district_name_e:'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">

            <div class="d-flex flex-column flex-root">
															<span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceTehsil->tehsil_name_e)?$application->residenceTehsil->tehsil_name_e:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->residenceAddressCapacity->capacity_name)?$application->residenceAddressCapacity->capacity_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_percentage') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_share'])?$application['residence_share']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_acquisition_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_acquisition_date'])?$application['residence_acquisition_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.mobile_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['personal_mobile_no'])?$application['personal_mobile_no']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.email_address') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['personal_email'])?$application['personal_email']:'' }}</span>
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
                    class="opacity-70">{{ isset($application['business_name'])?$application['business_name']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_start_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_establishment_date'])?$application['business_establishment_date']:'' }}</span>
            </div>

        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessRegistrationStatus->name)?$application->businessRegistrationStatus->name:'' }}</span>
            </div>
        </div>
        <div
            class="d-flex justify-content-between pt-5 @if(isset($application->businessRegistrationStatus->name) && $application->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_legal_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessLegalStatus->legal_name)?$application->businessLegalStatus->legal_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
            </div>

        </div>
        <div
            class="d-flex justify-content-between pt-5 @if(isset($application->businessRegistrationStatus->name) && $application->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_date') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_registration_date'])?$application['business_registration_date']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_ntn_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_ntn_no'])?$application['business_ntn_no']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_category') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessCategory->category_name)?$application->businessCategory->category_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessActivity->group_name)?$application->businessActivity->group_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sub_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessActivity->class_name)?$application->businessActivity->class_name:'' }}</span>
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
            @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                <tr>
                    <td>{!! __('labels.ownership_proof') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($application['proof_of_ownership_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                <tr>
                    <td>{!! __('labels.registration_proof') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($application['license_registration_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                <tr class="d-box @if(isset($application->businessRegistrationStatus->name) && $application->businessRegistrationStatus->name=='Unregistered') d-none-imp  @endif">
                    <td>{!! __('labels.registration_certificate') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($application['registration_certificate_file']) }}"
                            target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($application->otherDocuments) && $application->otherDocuments->isNotEmpty())
                @foreach($application->otherDocuments as $other_file)
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
                    class="opacity-70">{{ isset($application->businessAddressType->type_name)?$application->businessAddressType->type_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_form') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessAddressForm->form_name)?$application->businessAddressForm->form_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_1') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_address_1'])?$application['business_address_1']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_2') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_address_2'])?$application['business_address_2']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_3') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_address_3'])?$application['business_address_3']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.province') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessProvince->province_name)?$application->businessProvince->province_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessCity->city_name_e)?$application->businessCity->city_name_e:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessDistrict->district_name_e)?$application->businessDistrict->district_name_e:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessTehsil->tehsil_name_e)?$application->businessTehsil->tehsil_name_e:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->businessCapacity->capacity_name)?$application->businessCapacity->capacity_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_business_place') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_share'])?$application['business_share']:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_date_place') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_acquisition_date'])?$application['business_acquisition_date']:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_evidence_tenancy') !!}</span>
                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['business_evidence_ownership_file']) }}"
                                   target="_blank" class="hand"><i class="flaticon2-download"></i> Download</a>
                            </span>
                </div>
            @endif

        </div>
        <div class="d-flex justify-content-between pt-5">

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_contact_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_contact_number'])?$application['business_contact_number']:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_email_address') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_email'])?$application['business_email']:'' }}</span>
            </div>
        </div>
    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.utility_connections_heading') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white">
        <span>{!! __('labels.utility_connections_detail') !!}</span></h4>
    <div class="section_box">

        @if(isset($application->utilityConnections) && $application->utilityConnections->isNotEmpty())
        @foreach($application->utilityConnections as $index=>$connection)
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

        @if(isset($application->employeeInfos) && $application->employeeInfos->isNotEmpty())
            @foreach($application->employeeInfos as $employee)
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
                    class="opacity-70">{{ isset($application->turnoverFiscalYear->year_name)?$application->turnoverFiscalYear->year_name:'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.annual_turnover_fiscal_year') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['annual_turnover'])?$application['annual_turnover']:'' }}</span>
            </div>
        </div>

        <div class="d-flex justify-content-between pt-5">

            @if(isset($application['business_account_statement_file']) && !empty($application['business_account_statement_file']))
                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_account_statement') !!}</span>
                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['business_account_statement_file']) }}"
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
                    class="opacity-70">{{ isset($application->exportFiscalYear->year_name)?$application->exportFiscalYear->year_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->exportCurrency->currency_name)?$application->exportCurrency->currency_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.export_turnover') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['export_annual_turnover'])?$application['export_annual_turnover']:'' }}</span>
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
                    class="opacity-70">{{ isset($application->importFiscalYear->year_name)?$application->importFiscalYear->year_name:'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($application->importCurrency->currency_name)?$application->importCurrency->currency_name:'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.import_turnover') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['import_annual_turnover'])?$application['import_annual_turnover']:'' }}</span>
            </div>
        </div>



    </div>

