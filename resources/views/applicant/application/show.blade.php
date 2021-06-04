@extends('_layouts.applicant.app')
@push('title','SME Show')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">My SMEs</h3>
            </div>
        </div>
        <div class="card-body">
            <h4 class="main_section_heading">APPLICANT PROFILE</h4>
            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BASIC INFO</span></h4>
            <div class="section_box">

            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">First Name: *</span>
                    <span class="opacity-70">{{ isset($application->prefix->prefix_name)?$application->prefix->prefix_name:'' }}&nbsp;{{ isset($application['first_name'])?$application['first_name']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Middle Name:</span>
                    <span class="opacity-70">{{ isset($application['middle_name'])?$application['middle_name']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Last Name: *</span>
                    <span class="opacity-70">{{ isset($application['last_name'])?$application['last_name']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Gender: *</span>
                    <span class="opacity-70">{{ isset($application->gender->gender_name)?$application->gender->gender_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">CNIC No. *</span>
                    <span class="opacity-70">{{ isset($application['cnic_no'])?$application['cnic_no']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">CNIC Issue Date: *</span>
                    <span class="opacity-70">{{ isset($application['cnic_issue_date'])?$application['cnic_issue_date']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">CNIC Expiry Date: *</span>
                    <span class="opacity-70">{{ isset($application['cnic_expiry_date'])?$application['cnic_expiry_date']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Date of Birth: *</span>
                    <span class="opacity-70">{{ isset($application['date_of_birth'])?$application['date_of_birth']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Designation in Business: *</span>
                    <span class="opacity-70">{{ isset($application->designationBusiness->name)?$application->designationBusiness->name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Do you have Minority Status? *</span>
                    <span class="opacity-70">{{ isset($application->minorityStatusQuestion->name)?$application->minorityStatusQuestion->name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root"  @if(isset($application->minorityStatusQuestion->name) && $application->minorityStatusQuestion->name=='No') style="display: none !important;" @endif>
                    <span class="font-weight-bolder mb-2">Minority Status: *</span>
                    <span class="opacity-70">{{ isset($application->minorityStatus->name)?$application->minorityStatus->name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">

                <div class="d-flex flex-column flex-root @if(isset($application->minorityStatus->name) && $application->minorityStatus->name=='Other') d-box @else d-none-imp @endif">
                    <span class="font-weight-bolder mb-2">Other: *</span>
                    <span class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
                </div>

                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">National Tax Number (Personal): *</span>
                    <span class="opacity-70">{{ isset($application['ntn_personal'])?$application['ntn_personal']:'' }}</span>
                </div>

            </div>
            </div>
            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>QUALIFICATION DETAILS</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Education Level: *</span>
                    <span class="opacity-70">{{ isset($application->educationLevel->name)?$application->educationLevel->name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Do you have any Technical Education? *</span>
                    <span class="opacity-70">{{ isset($application->educationLevelQuestion->name)?$application->educationLevelQuestion->name:'' }}</span>
                </div>
            </div>


            @if(isset($application->technicalEducations) && $application->technicalEducations->isNotEmpty())
                @foreach($application->technicalEducations as $index=>$education)
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Diploma/ Certificate Title: *</span>
                            <span class="opacity-70">{{ isset($education['certificate_title'])?$education['certificate_title']:'' }}</span>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Are you a skilled worker or an artisan? *</span>
                    <span class="opacity-70">{{ isset($application->skilledWorkerQuestion->name)?$application->skilledWorkerQuestion->name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root " @if(isset($application->skilledWorkerQuestion->name) && $application->skilledWorkerQuestion->name=='No') style="display: none !important;" @endif>
                    <span class="font-weight-bolder mb-2">Skill or Art: *</span>
                    <span class="opacity-70">{{ isset($application['skill_or_art'])?$application['skill_or_art']:'' }}</span>
                </div>
            </div>
            </div>

            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RESIDENCE ADDRESS (LOCAL)</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Type of Property: *</span>
                    <span class="opacity-70">{{ isset($application->residenceAddressType->type_name)?$application->residenceAddressType->type_name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Form of Property: *</span>
                    <span class="opacity-70">{{ isset($application->residenceAddressForm->form_name)?$application->residenceAddressForm->form_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Unit / Address 1: *</span>
                    <span class="opacity-70">{{ isset($application['residence_address_1'])?$application['residence_address_1']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Complex / Street / Address 2: *</span>
                    <span class="opacity-70">{{ isset($application['residence_address_2'])?$application['residence_address_2']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Area/ Locality / Address 3: *</span>
                    <span class="opacity-70">{{ isset($application['residence_address_3'])?$application['residence_address_3']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">City: *</span>
                    <span class="opacity-70">{{ isset($application->residenceCity->city_name_e)?$application->residenceCity->city_name_e:'' }}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">District: *</span>
                    <span class="opacity-70">{{ isset($application->residenceDistrict->district_name_e)?$application->residenceDistrict->district_name_e:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Capacity: *</span>
                    <span class="opacity-70">{{ isset($application->residenceAddressCapacity->capacity_name)?$application->residenceAddressCapacity->capacity_name:'' }}</span>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Share %: *</span>
                    <span class="opacity-70">{{ isset($application->residence_share)?$application->residence_share:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Acquisition Date: *</span>
                    <span class="opacity-70">{{ isset($application['residence_acquisition_date'])?$application['residence_acquisition_date']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Mobile No. *</span>
                    <span class="opacity-70">{{ isset($application['personal_mobile_no'])?$application['personal_mobile_no']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Email Address: *</span>
                    <span class="opacity-70">{{ isset($application['personal_email'])?$application['personal_email']:'' }}</span>
                </div>
            </div>

            </div>

            <h4 class="mt-10 main_section_heading">BUSINESS PROFILE</h4>
            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BASIC INFO</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Name: *</span>
                    <span class="opacity-70">{{ isset($application['business_name'])?$application['business_name']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Acquisition/ Start/ Establishment/ Formation Date: *</span>
                    <span class="opacity-70">{{ isset($application['business_establishment_date'])?$application['business_establishment_date']:'' }}</span>
                </div>

            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Registration Status: *</span>
                    <span class="opacity-70">{{ isset($application->businessRegistrationStatus->name)?$application->businessRegistrationStatus->name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5" @if(isset($application->businessRegistrationStatus->name) && $application->businessRegistrationStatus->name=='Unregistered') style="display: none !important;"  @endif>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Legal Status of Business: *</span>
                    <span class="opacity-70">{{ isset($application->businessLegalStatus->legal_name)?$application->businessLegalStatus->legal_name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Registration Number: *</span>
                    <span class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
                </div>

            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Category: *</span>
                    <span class="opacity-70">{{ isset($application->businessActivity->section_name)?$application->businessActivity->section_name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Sector: *</span>
                    <span class="opacity-70">{{ isset($application->businessActivity->group_name)?$application->businessActivity->group_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Sub Sector: *</span>
                    <span class="opacity-70">{{ isset($application->businessActivity->class_name)?$application->businessActivity->class_name:'' }}</span>
                </div>
            </div>
            </div>

            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RELEVANT ATTACHMENTS</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Upload Proof of Ownership: *</span>
                        <span class="opacity-70">
                                <a href="{{ asset('storage/'.$application['proof_of_ownership_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                    </div>
                @endif
                @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Upload Registration Certificate: *</span>
                        <span class="opacity-70">
                                <a href="{{ asset('storage/'.$application['registration_certificate_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between pt-5">
                @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">License /Registration with chamber or Trade body: *</span>
                        <span class="opacity-70">
                                <a href="{{ asset('storage/'.$application['license_registration_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                    </div>
                @endif
            </div>
            </div>

            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BUSINESS ADDRESS</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Type of Property: *</span>
                    <span class="opacity-70">{{ isset($application->businessAddressType->type_name)?$application->businessAddressType->type_name:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Form of Property: *</span>
                    <span class="opacity-70">{{ isset($application->businessAddressForm->form_name)?$application->businessAddressForm->form_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Unit / Address 1: *</span>
                    <span class="opacity-70">{{ isset($application['business_address_1'])?$application['business_address_1']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Complex / Street / Address 2: *</span>
                    <span class="opacity-70">{{ isset($application['business_address_2'])?$application['business_address_2']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Area/ Locality / Address 3: *</span>
                    <span class="opacity-70">{{ isset($application['business_address_3'])?$application['business_address_3']:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Provinces: *</span>
                    <span class="opacity-70">{{ isset($application->businessProvince->province_name)?$application->businessProvince->province_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">City: *</span>
                    <span class="opacity-70">{{ isset($application->businessCity->city_name_e)?$application->businessCity->city_name_e:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">District: *</span>
                    <span class="opacity-70">{{ isset($application->businessDistrict->district_name_e)?$application->businessDistrict->district_name_e:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Tehsil: *</span>
                    <span class="opacity-70">{{ isset($application->businessTehsil->tehsil_name_e)?$application->businessTehsil->tehsil_name_e:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Capacity: *</span>
                    <span class="opacity-70">{{ isset($application->businessCapacity->capacity_name)?$application->businessCapacity->capacity_name:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Share %: *</span>
                    <span class="opacity-70">{{ isset($application->business_share)?$application->business_share:'' }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Acquisition Date: *</span>
                    <span class="opacity-70">{{ isset($application['business_acquisition_date'])?$application['business_acquisition_date']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Evidence of tenancy/ ownership of business premises: *</span>
                        <span class="opacity-70">
                                <a href="{{ asset('storage/'.$application['business_evidence_ownership_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                    </div>
                @endif
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Contact No. *</span>
                    <span class="opacity-70">{{ isset($application['business_contact_number'])?$application['business_contact_number']:'' }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between pt-5">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Business Email Address: *</span>
                    <span class="opacity-70">{{ isset($application['business_email'])?$application['business_email']:'' }}</span>
                </div>
            </div>
            </div>

            <h4 class="mt-10 main_section_heading">UTILITY CONNECTIONS</h4>
            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>UTILITY CONNECTIONS DETAIL</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Do you have utility connections? *</span>
                    <span class="opacity-70">{{ isset($application->utilityConnectionQuestion->name)?$application->utilityConnectionQuestion->name:'' }}</span>
                </div>
            </div>

            @if(isset($application->utilityConnections) && $application->utilityConnections->isNotEmpty())
            @foreach($application->utilityConnections as $index=>$connection)
                <div class="d-flex justify-content-between pt-5">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Connection Ownership: *</span>
                        <span class="opacity-70">{{ isset($connection->connectionOwnership->ownership_name)?$connection->connectionOwnership->ownership_name:'' }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Utility Type: *</span>
                        <span class="opacity-70">{{ isset($connection->utilityType->type_name)?$connection->utilityType->type_name:'' }}</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between pt-5">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Reference/ Consumer Number: *</span>
                        <span class="opacity-70">{{ isset($connection['utility_consumer_number'])?$connection['utility_consumer_number']:'' }}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Form/Type of Connection: *</span>
                        <span class="opacity-70">{{ isset($connection->utilityForm->form_name)?$connection->utilityForm->form_name:'' }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between pt-5">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">Provider: *</span>
                        <span class="opacity-70">{{ isset($connection['utility_provider_other'])?$connection['utility_provider_other']:'' }}</span>
                    </div>
                </div>
            @endforeach
            @endif
            </div>

            <h4 class="mt-10 main_section_heading">EMPLOYEES INFO</h4>
            <h4 class="mt-10 font-weight-bold section_heading text-white"><span>EMPLOYEES INFO DETAIL</span></h4>
            <div class="section_box">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">Do you have employees? *</span>
                    <span class="opacity-70">{{ isset($application->employeesQuestion->name)?$application->employeesQuestion->name:'' }}</span>
                </div>
            </div>

            @if(isset($application->employeeInfos) && $application->employeeInfos->isNotEmpty())
            @foreach($application->employeeInfos as $employee)
                    <h6 class="mb-4 mt-5 font-weight-bold text-dark">{{ isset($employee->employeeType->type_name)?$employee->employeeType->type_name:'' }}</h6>
                    <div class="d-flex justify-content-between pt-5">
                        @foreach($genders as $gender)
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{{ $gender }}</span>
                                <span class="opacity-70">{{ isset($employee[strtolower($gender)])?$employee[strtolower($gender)]:'' }}</span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
            </div>
            {{--Employee Info Here--}}


        </div>
    </div>
    <!--end::Card-->

@endsection
