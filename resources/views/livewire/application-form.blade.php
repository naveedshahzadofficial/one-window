<div x-data class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">

            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>1.</span>Applicant Profile</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>2.</span>Business Profile</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">
                        <span>3</span>Review and Submit</h3>
                    <div class="wizard-bar"></div>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

        </div>
    </div>
    <!--end: Wizard Nav-->
    <!--begin: Wizard Body-->
    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
        <div class="col-xl-12 col-xxl-12">
            <!--begin: Wizard Form-->
            <form  class="form" >

                <!--begin: Wizard Step 1-->

                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="mb-10 font-weight-bold text-dark">Basic Info</h4>

                    <div class="form-group row">
                        <div class="col-lg-6">

                            <div class="col-lg-4 float-left pl-0 ">
                                <label>Prefix: *</label>
                                <select wire:model="application.prefix"  class="form-control @error('application.prefix') is-invalid @enderror">
                                    <option value="">Select Prefix</option>
                                    @foreach($prefixes as $prefix)
                                        <option value="{{ $prefix }}">{{ $prefix }}</option>
                                    @endforeach
                                </select>
                                @error('application.prefix')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-8 float-right pl-0 pr-0">
                            <label>First Name: *</label>
                            <input wire:model="application.first_name" type="text" class="form-control @error('application.first_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.first_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label>Middle Name:</label>
                            <input wire:model="application.middle_name" type="text" class="form-control @error('application.middle_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.middle_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Last Name: *</label>
                            <input wire:model="application.last_name" type="text" class="form-control @error('application.last_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.last_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                                <label>Gender: *</label>
                                <div class="radio-inline">
                                    @foreach($genders as $gender)
                                    <label class="radio">
                                        <input wire:model="application.gender" type="radio" name="gender" value="{{ $gender }}">
                                        <span></span>{{ $gender }}</label>
                                    @endforeach
                                </div>
                            @error('application.gender')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>CNIC No. *</label>
                            <x-cnic-mask wire:model="application.cnic_no" />
                            @error('application.cnic_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label>CNIC Issue Date: *</label>
                            <x-date-picker wire:model="application.cnic_issue_date" />
                            @error('application.cnic_issue_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>CNIC Expiry Date: *</label>
                            <x-date-picker wire:model="application.cnic_expiry_date" />
                            @error('application.cnic_expiry_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Date of Birth: *</label>
                            <x-date-picker wire:model="application.date_of_birth" />
                            @error('application.date_of_birth')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Designation in Business: *</label>
                            <select wire:model="application.designation_business_id"  class="form-control @error('application.designation_business_id') is-invalid @enderror">
                                <option value="">Select Designation</option>
                                @foreach($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                @endforeach
                            </select>
                            @error('application.designation_business_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label>Do you have Minority Status? *</label>
                            <div class="radio-inline">
                                @foreach($questions as $question)
                                    <label class="radio">
                                        <input wire:model="application.minority_status_question_id" type="radio" name="minority_status_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.minority_status_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6 @if(!$is_minority_status) d-none @endif">
                            <label>Minority Status: *</label>
                            <select wire:model="application.minority_status_id"  class="form-control @error('application.minority_status_id') is-invalid @enderror">
                                <option value="">Select Status</option>
                                @foreach($minority_status as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('application.minority_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_minority_status || !$is_minority_status_other) d-none @endif">
                            <label>Other: *</label>
                            <input wire:model="application.minority_status_other" type="text" class="form-control @error('application.minority_status_other') is-invalid @enderror" placeholder="Minority Status Other" />
                            @error('application.minority_status_other')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>National Tax Number (Personal): *</label>
                            <input wire:model="application.ntn_personal" type="text" class="form-control @error('application.ntn_personal') is-invalid @enderror" placeholder="NTN (Personal)" />
                            @error('application.ntn_personal')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Qualification Details</h4>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Education Level: *</label>
                            <select wire:model="application.education_level_id"  class="form-control @error('application.education_level_id') is-invalid @enderror">
                                <option value="">Select Status</option>
                                @foreach($education_level as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('application.education_level_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Do you have any Technical Education? *</label>
                            <div class="radio-inline">
                                @foreach($questions as $question)
                                    <label class="radio">
                                        <input wire:model="application.technical_education_question_id" type="radio" name="technical_education_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.technical_education_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_technical_education) d-none @endif">
                            <label>Diploma/ Certificate Title: *</label>
                            <input wire:model="application.certificate_title" type="text" class="form-control @error('application.certificate_title') is-invalid @enderror" placeholder="Diploma/ Certificate Title" />
                            @error('application.minority_status_other')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Are you a skilled worker or an artisan? *</label>
                            <div class="radio-inline">
                                @foreach($questions as $question)
                                    <label class="radio">
                                        <input wire:model="application.skilled_worker_question_id" type="radio" name="skilled_worker_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.skilled_worker_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_skilled_worker) d-none @endif">
                            <label>Skill or Art: *</label>
                            <input wire:model="application.skill_or_art" type="text" class="form-control @error('application.skill_or_art') is-invalid @enderror" placeholder="Skill or Art" />
                            @error('application.skill_or_art')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Residence Address (Local)</h4>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Type: *</label>
                            <select wire:model="application.residence_address_type_id"  class="form-control @error('application.residence_address_type_id') is-invalid @enderror">
                                <option value="">Select Type</option>
                                @foreach($address_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_address_type_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Form: *</label>
                            <select wire:model="application.residence_address_form_id"  class="form-control @error('application.residence_address_form_id') is-invalid @enderror">
                                <option value="">Select Form</option>
                                @foreach($address_forms as $form)
                                    <option value="{{ $form->id }}">{{ $form->form_name }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_address_form_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Unit / Address 1: *</label>
                            <input wire:model="application.residence_address_1" type="text" class="form-control @error('application.residence_address_1') is-invalid @enderror" placeholder="Address 1" />
                            @error('application.residence_address_1')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Complex / Street / Address 2: *</label>
                            <input wire:model="application.residence_address_2" type="text" class="form-control @error('application.residence_address_2') is-invalid @enderror" placeholder="Address 2" />
                            @error('application.residence_address_2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">


                        <div class="col-lg-6">
                            <label>Area/ Locality / Address 3: *</label>
                            <input wire:model="application.residence_address_3" type="text" class="form-control @error('application.residence_address_3') is-invalid @enderror" placeholder="Address 3" />
                            @error('application.residence_address_3')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>City: *</label>
                            <select wire:model="application.residence_city_id"  class="form-control @error('application.residence_city_id') is-invalid @enderror">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_city_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>District: *</label>
                            <select wire:model="application.residence_district_id"  class="form-control @error('application.residence_district_id') is-invalid @enderror">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Capacity: *</label>
                            <select wire:model="application.residence_capacity_id"  class="form-control @error('application.residence_capacity_id') is-invalid @enderror">
                                <option value="">Select Capacity</option>
                                @foreach($address_capacities as $capacity)
                                    <option value="{{ $capacity->id }}">{{ $capacity->capacity_name }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_capacity_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Share: *</label>
                            <select wire:model="application.residence_share_id"  class="form-control @error('application.residence_share_id') is-invalid @enderror">
                                <option value="">Select Share</option>
                                @foreach($address_shares as $share)
                                    <option value="{{ $share->id }}">{{ $share->share_name }}</option>
                                @endforeach
                            </select>
                            @error('application.residence_share_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Acquisition Date: *</label>
                            <x-date-picker wire:model="application.residence_acquisition_date" />
                            @error('application.residence_acquisition_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Mobile No. *</label>
                            <input readonly wire:model="application.personal_mobile_no" type="text" class="form-control @error('application.personal_mobile_no') is-invalid @enderror" placeholder="Mobile No." />
                            @error('application.personal_mobile_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Email Address: *</label>
                            <input readonly wire:model="application.personal_email" type="text" class="form-control @error('application.personal_email') is-invalid @enderror" placeholder="Email Address" />
                            @error('application.personal_email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                </div>

                <!--end: Wizard Step 1-->

                <!--begin: Wizard Step 2-->

                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="mb-10 font-weight-bold text-dark">Basic Info</h4>

                    <div class="form-group row">
                        <div class="col-lg-6">
                                <label>Business Name: *</label>
                                <input wire:model="application.business_name" type="text" class="form-control @error('application.business_name') is-invalid @enderror" placeholder="Business Name" />
                                @error('application.business_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Business Acquisition/ Start/ Establishment/ Formation Date: *</label>
                            <x-date-picker wire:model="application.business_establishment_date" />
                            @error('application.business_establishment_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Business Registration Status: *</label>
                            <select wire:model="application.business_registration_status_id"  class="form-control @error('application.business_registration_status_id') is-invalid @enderror">
                                <option value="">Select Status</option>
                                @foreach($business_registration_status as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_registration_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_business_registered) d-none @endif">
                            <label>Legal Status of Business: *</label>
                            <select wire:model="application.business_legal_status_id"  class="form-control @error('application.business_legal_status_id') is-invalid @enderror">
                                <option value="">Select Business</option>
                                @foreach($business_legal_statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->legal_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_legal_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row @if(!$is_business_registered) d-none @endif">

                        <div class="col-lg-6">
                            <label>Business Registration Number: *</label>
                            <input wire:model="application.business_registration_number" type="text" class="form-control @error('application.business_registration_number') is-invalid @enderror" placeholder="Registration Number" />
                            @error('application.business_registration_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Business Registration Date: *</label>
                            <x-date-picker wire:model="application.business_registration_date" />
                            @error('application.business_registration_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row  @if(!$is_business_registered) d-none @endif">
                        <div class="col-lg-6">
                            <label>Business NTN: *</label>
                            <input wire:model="application.business_ntn_no" type="text" class="form-control @error('application.business_ntn_no') is-invalid @enderror" placeholder="Business NTN" />
                            @error('application.business_ntn_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Business Category: *</label>
                            <select wire:model="application.business_category_id"  class="form-control @error('application.business_category_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach($business_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Business Sector: *</label>
                            <select wire:model="application.business_sector_id"  class="form-control @error('application.business_sector_id') is-invalid @enderror">
                                <option value="">Select Sector</option>
                                @foreach($business_secotors as $sector)
                                    <option value="{{ $sector->id }}">{{ $sector->sector_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.business_sector_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Business Sub Sector: *</label>
                            <select wire:model="application.business_sub_sector_id"  class="form-control @error('application.business_sub_sector_id') is-invalid @enderror">
                                <option value="">Select Sector</option>
                                @foreach($business_sub_secotors as $sub_sector)
                                    <option value="{{ $sub_sector->id }}">{{ $sub_sector->sub_sector_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.business_sub_sector_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Relevant Attachments</h4>
                    <div class="form-group row">
                        <div class="col-lg-6">
                                <label>Upload Proof of Ownership: *</label>
                            <input type="file" class="form-control" wire:model="proof_of_ownership_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                        </div>


                        <div class="col-lg-6">
                            <label>Upload Registration Certificate: *</label>
                            <input type="file" class="form-control" wire:model="registration_certificate_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>License /Registration with chamber or Trade body: *</label>
                            <input type="file" class="form-control" wire:model="license_registration_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                        </div>
                    </div>


                    <h4 class="mb-10 font-weight-bold text-dark">Business Address</h4>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Type: *</label>
                            <select wire:model="application.business_address_type_id"  class="form-control @error('application.business_address_type_id') is-invalid @enderror">
                                <option value="">Select Type</option>
                                @foreach($address_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_address_type_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Form: *</label>
                            <select wire:model="application.business_address_form_id"  class="form-control @error('application.business_address_form_id') is-invalid @enderror">
                                <option value="">Select Form</option>
                                @foreach($address_forms as $form)
                                    <option value="{{ $form->id }}">{{ $form->form_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_address_form_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Unit / Address 1: *</label>
                            <input wire:model="application.business_address_1" type="text" class="form-control @error('application.business_address_1') is-invalid @enderror" placeholder="Address 1" />
                            @error('application.business_address_1')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Complex / Street / Address 2: *</label>
                            <input wire:model="application.business_address_2" type="text" class="form-control @error('application.business_address_2') is-invalid @enderror" placeholder="Address 2" />
                            @error('application.business_address_2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Area/ Locality / Address 3: *</label>
                            <input wire:model="application.business_address_3" type="text" class="form-control @error('application.business_address_3') is-invalid @enderror" placeholder="Address 3" />
                            @error('application.business_address_3')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Provinces: *</label>
                            <select wire:model="application.business_province_id"  class="form-control @error('application.business_province_id') is-invalid @enderror">
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_province_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>City: *</label>
                            <select wire:model="application.business_city_id"  class="form-control @error('application.business_city_id') is-invalid @enderror">
                                <option value="">Select City</option>
                                @foreach($business_cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.business_city_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>District: *</label>
                            <select wire:model="application.business_district_id"  class="form-control @error('application.business_district_id') is-invalid @enderror">
                                <option value="">Select District</option>
                                @foreach($business_districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.business_district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Tehsil: *</label>
                            <select wire:model="application.business_tehsil_id"  class="form-control @error('application.business_tehsil_id') is-invalid @enderror">
                                <option value="">Select Tehsil</option>
                                @foreach($business_tehsils as $tehsil)
                                    <option value="{{ $tehsil->id }}">{{ $tehsil->tehsil_name_e }}</option>
                                @endforeach
                            </select>
                            @error('application.business_tehsil_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Capacity: *</label>
                            <select wire:model="application.business_capacity_id"  class="form-control @error('application.business_capacity_id') is-invalid @enderror">
                                <option value="">Select Capacity</option>
                                @foreach($address_capacities as $capacity)
                                    <option value="{{ $capacity->id }}">{{ $capacity->capacity_name }}</option>
                                @endforeach
                            </select>
                            @error('application.business_capacity_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group row">

                    <div class="col-lg-6">
                        <label>Share: *</label>
                        <select wire:model="application.business_share_id"  class="form-control @error('application.business_share_id') is-invalid @enderror">
                            <option value="">Select Share</option>
                            @foreach($address_shares as $share)
                                <option value="{{ $share->id }}">{{ $share->share_name }}</option>
                            @endforeach
                        </select>
                        @error('application.business_share_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Acquisition Date: *</label>
                        <x-date-picker wire:model="application.business_acquisition_date" />
                        @error('application.business_acquisition_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>


                </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Evidence of tenancy/ ownership of business premises: *</label>
                            <input type="file" class="form-control" wire:model="business_evidence_ownership_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                        </div>


                    <div class="col-lg-6">
                        <label>Business Contact No. *</label>
                        <input wire:model="application.business_contact_number" type="text" class="form-control @error('application.business_contact_number') is-invalid @enderror" placeholder="Contact No." />
                        @error('application.business_contact_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>
                    <div class="form-group row">

                    <div class="col-lg-6">
                        <label>Business Email Address: *</label>
                        <input wire:model="application.business_email" type="email" class="form-control @error('application.business_email') is-invalid @enderror" placeholder="Email Address" />
                        @error('application.business_email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Utility Connections</h4>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Do you have utility connections? *</label>
                            <div class="radio-inline">
                                @foreach($questions as $question)
                                    <label class="radio">
                                        <input wire:model="application.utility_connection_question_id" type="radio" name="utility_connection_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.utility_connection_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    @foreach($utility_connections as $index=>$connection)
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Connection Ownership: *</label>
                            <div class="radio-inline">
                                @foreach($ownerships as $ownership)
                                    <label class="radio">
                                        <input wire:model="utility_connections.{{$index}}.connection_ownership_id" type="radio" name="utility_connections[{{$index}}][connection_ownership_id]" value="{{ $ownership->id }}">
                                        <span></span>{{ $ownership->ownership_name }}</label>
                                @endforeach
                            </div>
                            @if($errors->has("utility_connections.$index.connection_ownership_id"))
                                <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.connection_ownership_id") }}</div>
                            @endif
                        </div>

                        <div class="col-lg-6">
                            <label>Utility Type: *</label>
                            <div class="radio-inline">
                                @foreach($utility_types as $type)
                                    <label class="radio">
                                        <input wire:model.defer="utility_connections.{{$index}}.utility_type_id" type="radio" name="utility_connections[{{$index}}][utility_type_id]" value="{{ $type->id }}">
                                        <span></span>{{ $type->type_name }}</label>
                                @endforeach
                            </div>
                            @if($errors->has("utility_connections.$index.utility_type_id"))
                                <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_type_id") }}</div>
                            @endif
                        </div>

                    </div>
                        <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Reference/ Consumer Number: *</label>
                            <input wire:model.defer="utility_connections.{{$index}}.utility_consumer_number" type="text" class="form-control @if($errors->has("utility_connections.$index.utility_consumer_number")) is-invalid @endif" placeholder="Consumer Number" />
                            @if($errors->has("utility_connections.$index.utility_consumer_number"))
                                <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_consumer_number") }}</div>
                            @endif
                        </div>

                         <div class="col-lg-6">
                                <label>Form/Type of Connection: *</label>
                                <div class="radio-inline">
                                    @foreach($address_forms as $form)
                                        <label class="radio">
                                            <input wire:model.defer="utility_connections.{{$index}}.utility_form_id" type="radio" name="utility_connections[{{$index}}][utility_form_id]" value="{{ $form->id }}">
                                            <span></span>{{ $form->form_name }}</label>
                                    @endforeach
                                </div>
                                @if($errors->has("utility_connections.$index.utility_form_id"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_form_id") }}</div>
                                @endif
                          </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Provider: *</label>
                            <input wire:model.defer="utility_connections.{{$index}}.utility_provider_other" type="text" class="form-control @if($errors->has("utility_connections.$index.utility_provider_other")) is-invalid @endif" placeholder="Provider" />
                            @if($errors->has("utility_connections.$index.utility_provider_other"))
                            <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_provider_other") }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6 pt-9">
                        @if($index>0)
                        <span wire:click.prevent="removeUtilityConnection({{ $index }})" wire:loading.attr="disabled"  class="btn btn-xs btn-icon btn-danger">
                            <i class="flaticon2-delete"></i>
                        </span>
                        @endif
                        &nbsp;&nbsp;
                        @if(count($utility_connections)==($index+1))
                        <span wire:click.prevent="addUtilityConnection" wire:loading.attr="disabled"  class="btn btn-xs btn-icon btn-primary">
                            <i class="flaticon2-plus"></i>
                        </span>
                        @endif

                        </div>
                    </div>
                    @endforeach

                    <h4 class="mb-10 font-weight-bold text-dark">Employees Info</h4>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Do you have employees? *</label>
                            <div class="radio-inline">
                                @foreach($questions as $question)
                                    <label class="radio">
                                        <input wire:model="application.employees_question_id" type="radio" name="employees_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.employees_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @foreach($employee_types as $key => $type)
                    <h6 class="mb-4 font-weight-bold text-dark @if(!$is_employee_info) d-none @endif">{{$type}}</h6>
                    <div class="form-group row @if(!$is_employee_info) d-none @endif">
                        @foreach($genders as $gender)
                        <div class="col-lg-4">
                            <label>{{ $gender }} </label>
                            <select wire:model="employees.{{$key.'.'.strtolower($gender)}}"  class="form-control @error("employees.".$key.'.'.strtolower($gender)) is-invalid @enderror">
                                <option value="">Select Number</option>
                                @for($no=1; $no<=$employee_numbers;$no++)
                                    <option value="{{ $no }}">{{ $no }}</option>
                                @endfor
                            </select>
                            @error("employees.".$key.'.'.strtolower($gender))
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        @endforeach

                    </div>
                    @endforeach

                    <h4 class="mb-10 font-weight-bold text-dark">Annual Turnover</h4>
                    <h6 class="mb-10 font-weight-bold text-dark">Estimated annual turnover in last completed Fiscal Year</h6>
                    <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Fiscal Year: *</label>
                        <select wire:model.defer="application.turnover_fiscal_year_id"  class="form-control @error('application.turnover_fiscal_year_id') is-invalid @enderror">
                            <option value="">Select Year</option>
                            @foreach($fiscal_years as $year)
                                <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                            @endforeach
                        </select>
                        @error('application.turnover_fiscal_year_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Annual Turnover for the selected Fiscal Year (PKR): *</label>
                        <input wire:model.model.defer="application.annual_turnover" type="text" class="form-control @error('application.annual_turnover') is-invalid @enderror" placeholder="Annual Turnover" />
                        @error('application.annual_turnover')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Attachments (Income Tax Return / Audited Statements / Business Account Bank Statement): *</label>
                            <input type="file" class="form-control" wire:model="business_account_statement_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                        </div>
                    </div>
                    <h6 class="mb-10 font-weight-bold text-dark">Exports in last completed Fiscal Year</h6>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Fiscal Year: *</label>
                            <select wire:model.defer="application.export_fiscal_year_id"  class="form-control @error('application.export_fiscal_year_id') is-invalid @enderror">
                                <option value="">Select Year</option>
                                @foreach($fiscal_years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                @endforeach
                            </select>
                            @error('application.export_fiscal_year_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Currency: *</label>
                            <div class="radio-inline">
                                @foreach($currencies as $currency)
                                    <label class="radio">
                                        <input wire:model.defer="application.export_currency_id" type="radio" name="application.export_currency_id" value="{{ $currency->id }}">
                                        <span></span>{{ $currency->currency_name }}</label>
                                @endforeach
                            </div>
                            @error('application.export_currency_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Export Turnover for the selected Fiscal Year (PKR/ USD): *</label>
                            <input wire:model.defer="application.export_annual_turnover" type="text" class="form-control @error('application.export_annual_turnover') is-invalid @enderror" placeholder="Export Annual Turnover" />
                            @error('application.export_annual_turnover')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>




                </div>

                <!--end: Wizard Step 2-->

                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <!--begin::Section-->
                    <h4 class="mb-10 font-weight-bold text-dark">Applicant Profile</h4>
                    <h6 class="mb-0 font-weight-bold text-dark">Basic Info</h6>
                    <div class="separator separator-dashed my-5"></div>

                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">First Name: *</span>
                            <span class="opacity-70">{{ isset($application['prefix'])?$application['prefix']:'' }}&nbsp;{{ isset($application['first_name'])?$application['first_name']:'' }}</span>
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
                            <span class="opacity-70">{{ isset($application['gender'])?$application['gender']:'' }}</span>
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
                            <span class="opacity-70">{{ isset($application['designation_business_id'])?getCollectionTitle($designations,'name',$application['designation_business_id']):'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have Minority Status? *</span>
                            <span class="opacity-70">{{ isset($application['minority_status_question_id'])?getCollectionTitle($questions,'name',$application['minority_status_question_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root @if(!$is_minority_status) d-none @endif">
                            <span class="font-weight-bolder mb-2">Minority Status: *</span>
                            <span class="opacity-70">{{ isset($application['minority_status_id'])?getCollectionTitle($minority_status,'name',$application['minority_status_id']):'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5  @if(!$is_minority_status || !$is_minority_status_other) d-none @endif">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Other: *</span>
                            <span class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
                        </div>

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">National Tax Number (Personal): *</span>
                            <span class="opacity-70">{{ isset($application['ntn_personal'])?$application['ntn_personal']:'' }}</span>
                        </div>

                    </div>

                    <h6 class="mb-0 mt-10 font-weight-bold text-dark">Qualification Details</h6>
                    <div class="separator separator-dashed my-5"></div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Education Level: *</span>
                            <span class="opacity-70">{{ isset($application['education_level_id'])?getCollectionTitle($education_level,'name',$application['education_level_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have any Technical Education? *</span>
                            <span class="opacity-70">{{ isset($application['technical_education_question_id'])?getCollectionTitle($questions,'name',$application['technical_education_question_id']):'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5 @if(!$is_technical_education) d-none @endif">
                    <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Diploma/ Certificate Title: *</span>
                            <span class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Are you a skilled worker or an artisan? *</span>
                            <span class="opacity-70">{{ isset($application['skilled_worker_question_id'])?getCollectionTitle($questions,'name',$application['skilled_worker_question_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root  @if(!$is_skilled_worker) d-none @endif">
                            <span class="font-weight-bolder mb-2">Skill or Art: *</span>
                            <span class="opacity-70">{{ isset($application['skill_or_art'])?$application['skill_or_art']:'' }}</span>
                        </div>
                    </div>

                    <h6 class="mb-0 mt-10 font-weight-bold text-dark">Residence Address (Local)</h6>
                    <div class="separator separator-dashed my-5"></div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Type: *</span>
                            <span class="opacity-70">{{ isset($application['residence_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['residence_address_type_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Form: *</span>
                            <span class="opacity-70">{{ isset($application['residence_address_form_id'])?getCollectionTitle($address_forms,'form_name',$application['residence_address_form_id']):'' }}</span>
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
                            <span class="opacity-70">{{ isset($application['residence_city_id'])?getCollectionTitle($cities,'city_name_e',$application['residence_city_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">District: *</span>
                            <span class="opacity-70">{{ isset($application['residence_district_id'])?getCollectionTitle($districts,'district_name_e',$application['residence_district_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Capacity: *</span>
                            <span class="opacity-70">{{ isset($application['residence_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['residence_capacity_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Share: *</span>
                            <span class="opacity-70">{{ isset($application['residence_share_id'])?getCollectionTitle($address_shares,'share_name',$application['residence_share_id']):'' }}</span>
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

                    <h4 class="mb-10 mt-10 font-weight-bold text-dark">Business Profile</h4>
                    <h6 class="mb-0 font-weight-bold text-dark">Basic Info</h6>
                    <div class="separator separator-dashed my-5"></div>
                    <div class="d-flex justify-content-between pt-5">
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
                            <span class="opacity-70">{{ isset($application['business_registration_status_id'])?getCollectionTitle($business_registration_status,'name',$application['business_registration_status_id']):'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5 @if(!$is_business_registered) d-none @endif">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Legal Status of Business: *</span>
                            <span class="opacity-70">{{ isset($application['business_legal_status_id'])?getCollectionTitle($business_legal_statuses,'legal_name',$application['business_legal_status_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Registration Number: *</span>
                            <span class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
                        </div>

                    </div>

                    <div class="d-flex justify-content-between pt-5 @if(!$is_business_registered) d-none @endif">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Registration Date: *</span>
                            <span class="opacity-70">{{ isset($application['business_registration_date'])?$application['business_registration_date']:'' }}</span>
                        </div>

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business NTN: *</span>
                            <span class="opacity-70">{{ isset($application['business_ntn_no'])?$application['business_ntn_no']:'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Category: *</span>
                            <span class="opacity-70">{{ isset($application['business_category_id'])?getCollectionTitle($business_categories,'category_name',$application['business_category_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Sector: *</span>
                            <span class="opacity-70">{{ isset($application['business_sector_id'])?getCollectionTitle($business_secotors,'sector_name_e',$application['business_sector_id']):'' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Sub Sector: *</span>
                            <span class="opacity-70">{{ isset($application['business_sub_sector_id'])?getCollectionTitle($business_sub_secotors,'sub_sector_name_e',$application['business_sub_sector_id']):'' }}</span>
                        </div>
                    </div>




                    <!--end::Section-->
                </div>
                <!--end: Wizard Step 3-->

                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                    <div class="mr-2">
                        @if($step> 0 && $step<=2)
                        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-prev" wire:click.prevent="decreaseStep"  wire:loading.attr="disabled">Previous</button>
                        @endif
                    </div>
                    <div>
                        @if($step >= 2)
                        <button type="button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-submit" wire:loading.attr="disabled" wire:click.prevent="submitApplication">Submit</button>
                        @else
                        <button type="button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-next" wire:loading.attr="disabled" wire:click.prevent="submitApplication"  >Save & Next</button>
                        @endif
                    </div>
                </div>
                <!--end: Wizard Actions-->
            </form>
            <!--end: Wizard Form-->
        </div>
    </div>
    <!--end: Wizard Body-->
</div>


