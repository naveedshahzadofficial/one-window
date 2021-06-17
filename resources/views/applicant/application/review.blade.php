 <!--begin::Section-->
    <h4 class="main_section_heading">{!! __('labels.review_applicant_profile') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span></h4>

    <div class="section_box">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.first_name') !!}</span>
                <span class="opacity-70">{{ isset($application['prefix_id'])?getCollectionTitle($prefixes,'prefix_name',$application['prefix_id']):'' }}&nbsp;{{ isset($application['first_name'])?$application['first_name']:'' }}</span>
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
                    class="opacity-70">{{ isset($application['gender_id'])?getCollectionTitle($genders,'gender_name',$application['gender_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['designation_business_id'])?getCollectionTitle($designations,'name',$application['designation_business_id']):'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div
                :class="{'d-none-imp': is_minority_status=='No'}"
                class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.minority_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['minority_status_id'])?getCollectionTitle($minority_status,'name',$application['minority_status_id']):'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div
                :class="{'d-none-imp': !is_minority_status_other || is_minority_status=='No'}"
                class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.other_than_minority') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
            </div>


        </div>

        <div class="row pt-5" :class="{'d-none-imp': is_disability=='No'}">

            <table class="table">
                <head>
                    <tr>
                        <th>{!! __('labels.disability') !!}</th>
                        <th class="text-center">{!! __('labels.disability_certificate') !!}</th>
                    </tr>
                </head>
                <tbody>
                @foreach($disabilities as $index=>$disability)
                    @if(isset($disability['disability_certificate_file']) && !empty($disability['disability_certificate_file']))
                        <tr>
                            <td>{{ isset($disability['disability_id'])?getCollectionTitle($disability_options,'disability_name_e',$disability['disability_id']):'' }}</td>
                            <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($disability['disability_certificate_file']) }}"
                                                        target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.active_taxpayer') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['active_taxpayer_question_id'])?getCollectionTitle($questions,'name',$application['active_taxpayer_question_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['education_level_id'])?getCollectionTitle($education_level,'name',$application['education_level_id']):'' }}</span>
            </div>
        </div>

        <div class="row pt-5" :class="{'d-none-imp': is_technical_education=='No'}">
            <table class="table">
                <head>
                    <tr>
                        <th>{!! __('labels.technical_education_detail') !!}</th>
                    </tr>
                </head>
                <tbody>
                @foreach($technical_educations as $index=>$technical_education)
                    @if(isset($technical_education['certificate_title']) && !empty($technical_education['certificate_title']))
                        <tr>
                            <td>{{ isset($technical_education['certificate_title'])?$technical_education['certificate_title']:'' }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between pt-5">

            <div
                :class="{'d-none-imp': is_skilled_worker=='No'}"
                class="d-flex flex-column flex-root">
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
                    class="opacity-70">{{ isset($application['residence_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['residence_address_type_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_address_form_id'])?getCollectionTitle($residence_address_forms,'form_name',$application['residence_address_form_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['residence_province_id'])?getCollectionTitle($provinces,'province_name',$application['residence_province_id']):'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_city_id'])?getCollectionTitle($residence_cities,'city_name_e',$application['residence_city_id']):'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_district_id'])?getCollectionTitle($residence_districts,'district_name_e',$application['residence_district_id']):'' }}</span>
            </div>

        </div>

        <div class="d-flex justify-content-between pt-5">

            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_tehsil_id'])?getCollectionTitle($residence_tehsils,'tehsil_name_e',$application['residence_tehsil_id']):'' }}</span>
            </div>

            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.property_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['residence_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['residence_capacity_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['business_registration_status_id'])?getCollectionTitle($business_registration_status,'name',$application['business_registration_status_id']):'' }}</span>
            </div>
        </div>
        <div
            :class="{'d-none-imp': is_business_registered=='Registered'}"
            class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.business_legal_status') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_legal_status_id'])?getCollectionTitle($business_legal_statuses,'legal_name',$application['business_legal_status_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_no') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
            </div>

        </div>
        <div
            :class="{'d-none-imp': is_business_registered=='Registered'}"
            class="d-flex justify-content-between pt-5">
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
                    class="opacity-70">{{ isset($application['business_category_id'])?getCollectionTitle($business_categories,'category_name',$application['business_category_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.business_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'group_name',$application['business_activity_id']):'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.business_sub_sector') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'class_name',$application['business_activity_id']):'' }}</span>
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
                <tr :class="{'d-none-imp': is_business_registered=='Registered'}" class="d-box">
                    <td>{!! __('labels.registration_certificate') !!}</td>
                    <td class="text-center"> <a href="{{ \Illuminate\Support\Facades\Storage::url($application['registration_certificate_file']) }}"
                                                target="_blank" class="hand"><i class="flaticon2-download color-black"></i></a></td>
                </tr>
            @endif
            @if(isset($business_other_files) && count($business_other_files)>0)
                @foreach($business_other_files as $other_file)
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
                    class="opacity-70">{{ isset($application['business_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['business_address_type_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.property_form') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_address_form_id'])?getCollectionTitle($business_address_forms,'form_name',$application['business_address_form_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['business_province_id'])?getCollectionTitle($provinces,'province_name',$application['business_province_id']):'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_city_id'])?getCollectionTitle($business_cities,'city_name_e',$application['business_city_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_district_id'])?getCollectionTitle($business_districts,'district_name_e',$application['business_district_id']):'' }}</span>
            </div>
        </div>
        <div class="d-flex justify-content-between pt-5">
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_tehsil_id'])?getCollectionTitle($business_tehsils,'tehsil_name_e',$application['business_tehsil_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.residence_capacity') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['business_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['business_capacity_id']):'' }}</span>
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
                                   target="_blank" class="hand"><i class="flaticon2-download color-black"></i> Download</a>
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


        @foreach($utility_connections as $index=>$connection)
            <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_utility') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection['utility_form_id'])?getCollectionTitle($utility_forms,'form_name',$connection['utility_form_id']):'' }}</span>
                </div>

            </div>

            <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_connection') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection['utility_type_id'])?getCollectionTitle($utility_types,'type_name',$connection['utility_type_id']):'' }}</span>
                </div>

                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">{!! __('labels.connection_ownership') !!}</span>
                    <span
                        class="opacity-70">{{ isset($connection['connection_ownership_id'])?getCollectionTitle($ownerships,'ownership_name',$connection['connection_ownership_id']):'' }}</span>
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
                        class="opacity-70">{{ isset($connection['utility_service_provider_id'])?getCollectionTitle($all_utility_service_providers,'provider_name',$connection['utility_service_provider_id']):'' }}</span>
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
    </div>

    <h4 class="mt-10 main_section_heading">{!! __('labels.employee_info_heading') !!}
    </h4>
    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.employee_info_detail') !!}</span></h4>
    <div class="section_box">

        <div x-show="is_employee_info=='Yes'">
            @foreach($employees as $employee)
                @if(isset($employee['employee_type_id']) && !empty($employee['employee_type_id']))
                    <h6 class="mb-4 {{ $loop->first?'mt-5':'mt-10' }} font-weight-bold text-dark">{{ isset($employee['employee_type_id'])?getCollectionTitle($employee_types,'type_name',$employee['employee_type_id']):'' }}
                        &nbsp;(<span class="urdu-label"
                                     dir="rtl"> {{ isset($employee['employee_type_id'])?getCollectionTitle($employee_types,'type_name_u',$employee['employee_type_id']):'' }} </span>)
                    </h6>
                    <div class="d-flex justify-content-between">
                        @foreach($genders as $gender)
                            <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">{{ $gender->gender_name }} (<span
                                                    class="urdu-label" dir="rtl"> {{ $gender->gender_name_u }} </span>)</span>
                                <span
                                    class="opacity-70">{{ isset($employee[strtolower($gender->gender_name)])?$employee[strtolower($gender->gender_name)]:'' }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>

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
                    class="opacity-70">{{ isset($application['turnover_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['turnover_fiscal_year_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['export_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['export_fiscal_year_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['export_currency_id'])?getCollectionTitle($currencies,'currency_name',$application['export_currency_id']):'' }}</span>
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
                    class="opacity-70">{{ isset($application['import_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['import_fiscal_year_id']):'' }}</span>
            </div>
            <div class="d-flex flex-column flex-root">
                <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}</span>
                <span
                    class="opacity-70">{{ isset($application['import_currency_id'])?getCollectionTitle($currencies,'currency_name',$application['import_currency_id']):'' }}</span>
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


    <!--end::Section-->
