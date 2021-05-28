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
        <div class="col-xl-12 col-xxl-7">
            <!--begin: Wizard Form-->
            <form  class="form" >
                <!--begin: Wizard Step 1-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="mb-10 font-weight-bold text-dark">Basic Info</h4>

                    <div class="form-group row">
                        <div class="col-lg-4">

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

                        <div class="col-lg-4">
                            <label>Middle Name:</label>
                            <input wire:model="application.middle_name" type="text" class="form-control @error('application.middle_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.middle_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Last Name: *</label>
                            <input wire:model="application.last_name" type="text" class="form-control @error('application.last_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.last_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
                            <label>CNIC No. *</label>
                            <input wire:model="application.cnic_no" type="text" class="form-control @error('application.cnic_no') is-invalid @enderror" placeholder="First Name" />
                            @error('application.cnic_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>CNIC Issue Date *</label>
                            <x-date-picker wire:model="application.cnic_issue_date" />
                            @error('application.cnic_issue_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>CNIC Expiry Date *</label>
                            <x-date-picker wire:model="application.cnic_expiry_date" />
                            @error('application.cnic_expiry_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Date of Birth *</label>
                            <x-date-picker wire:model="application.date_of_birth" />
                            @error('application.date_of_birth')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
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

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-4">
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

                        <div class="col-lg-4 @if(!$is_minority_status) d-none @endif">
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

                        <div class="col-lg-4 @if(!$is_minority_status || !$is_minority_status_other) d-none @endif">
                            <label>Other: *</label>
                            <input wire:model="application.minority_status_other" type="text" class="form-control @error('application.minority_status_other') is-invalid @enderror" placeholder="Minority Status Other" />
                            @error('application.minority_status_other')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-4">
                            <label>National Tax Number (Personal): *</label>
                            <input wire:model="application.ntn_personal" type="text" class="form-control @error('application.ntn_personal') is-invalid @enderror" placeholder="NTN (Personal)" />
                            @error('application.ntn_personal')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Qualification Details</h4>

                    <div class="form-group row">

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                        <div class="col-lg-4 @if(!$is_technical_education) d-none @endif">
                            <label>Diploma/ Certificate Title: *</label>
                            <input wire:model="application.certificate_title" type="text" class="form-control @error('application.certificate_title') is-invalid @enderror" placeholder="Diploma/ Certificate Title" />
                            @error('application.minority_status_other')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
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

                        <div class="col-lg-4 @if(!$is_skilled_worker) d-none @endif">
                            <label>Skill or Art: *</label>
                            <input wire:model="application.skill_or_art" type="text" class="form-control @error('application.skill_or_art') is-invalid @enderror" placeholder="Skill or Art" />
                            @error('application.skill_or_art')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <h4 class="mb-10 font-weight-bold text-dark">Residence Address (Local)</h4>
                    <div class="form-group row">

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
                            <label>Unit / Address 1: *</label>
                            <input wire:model="application.residence_address_1" type="text" class="form-control @error('application.residence_address_1') is-invalid @enderror" placeholder="Address 1" />
                            @error('application.residence_address_1')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Complex / Street / Address 2: *</label>
                            <input wire:model="application.residence_address_2" type="text" class="form-control @error('application.residence_address_2') is-invalid @enderror" placeholder="Address 2" />
                            @error('application.residence_address_2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Area/ Locality / Address 3: *</label>
                            <input wire:model="application.residence_address_3" type="text" class="form-control @error('application.residence_address_3') is-invalid @enderror" placeholder="Address 3" />
                            @error('application.residence_address_3')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Acquisition Date: *</label>
                            <x-date-picker wire:model="application.residence_acquisition_date" />
                            @error('application.residence_acquisition_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Mobile No. *</label>
                            <input readonly wire:model="application.personal_mobile_no" type="text" class="form-control @error('application.personal_mobile_no') is-invalid @enderror" placeholder="Mobile No." />
                            @error('application.personal_mobile_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
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
                        <div class="col-lg-4">
                                <label>Business Name: *</label>
                                <input wire:model="application.business_name" type="text" class="form-control @error('application.business_name') is-invalid @enderror" placeholder="First Name" />
                                @error('application.business_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Business Acquisition/ Start/ Establishment/ Formation Date: *</label>
                            <x-date-picker wire:model="application.business_acquisition_date" />
                            @error('application.business_acquisition_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
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
                    </div>

                    <div class="form-group row @if(!$is_business_registered) d-none @endif">

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
                            <label>Business Registration Number: *</label>
                            <input wire:model="application.business_registration_number" type="text" class="form-control @error('application.business_registration_number') is-invalid @enderror" placeholder="Registration Number" />
                            @error('application.business_registration_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Business Registration Date: *</label>
                            <x-date-picker wire:model="application.business_registration_date" />
                            @error('application.business_registration_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row  @if(!$is_business_registered) d-none @endif">

                        <div class="col-lg-4">
                            <label>Business NTN: *</label>
                            <input wire:model="application.business_ntn_no" type="text" class="form-control @error('application.business_ntn_no') is-invalid @enderror" placeholder="Business NTN" />
                            @error('application.business_ntn_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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

                        <div class="col-lg-4">
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
                        <div class="col-lg-4">
                                <label>Upload Proof of Ownership</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" wire:model="proof_of_ownership_file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                        </div>


                        <div class="col-lg-4">
                            <label>Upload Registration Certificate</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" wire:model="registration_certificate_file">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label>License /Registration with chamber or Trade body</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" wire:model="license_registration_file">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                    </div>


                </div>
                <!--end: Wizard Step 2-->
                <!--begin: Wizard Step 5-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <!--begin::Section-->
                    <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                    <h6 class="font-weight-bolder mb-3">Current Address:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Address Line 1</div>
                        <div>Address Line 2</div>
                        <div>Melbourne 3000, VIC, Australia</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Details:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                        <div>Weight: 25kg</div>
                        <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Overnight Delivery with Regular Packaging</div>
                        <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                    <div class="text-dark-50 line-height-lg">
                        <div>Address Line 1</div>
                        <div>Address Line 2</div>
                        <div>Preston 3072, VIC, Australia</div>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end: Wizard Step 5-->
                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                    <div class="mr-2">
                        @if($step> 0 && $step<=2)
                        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-prev" wire:click="decreaseStep">Previous</button>
                        @endif
                    </div>
                    <div>
                        @if($step >= 2)
                        <button type="button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-submit" wire:loading.attr="disabled" wire:click.prevent="submitApplication">Submit</button>
                        @else
                        <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4 d-block" data-wizard-type="action-next" wire:loading.attr="disabled" wire:click.prevent="submitApplication"  >Save & Next</button>
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


