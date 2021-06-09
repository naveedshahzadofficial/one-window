<div
    x-data="{
is_minority_status: '{{ $is_minority_status ? 'Yes' : 'No' }}',
is_minority_status_other:'{{ $is_minority_status_other }}',
is_technical_education: '{{ $is_technical_education ? 'Yes' : 'No' }}',
is_skilled_worker: '{{ $is_skilled_worker ? 'Yes' : 'No' }}',
is_business_registered: '{{ $is_business_registered ? 'Registered' : 'Unregistered' }}',
is_utility_connection: '{{ $is_utility_connection==null?'':($is_utility_connection ?'Yes' : 'No') }}',
is_employee_info: '{{ $is_employee_info ? 'Yes' : 'No' }}',
is_annual_export: '{{ $is_annual_export ? 'Yes' : 'No' }}',
is_annual_import: '{{ $is_annual_import ? 'Yes' : 'No' }}',
is_cnic_lifetime: '{{ $is_cnic_lifetime ? 'Yes' : 'No' }}',
}"
    x-init="() => {
select2 = $($refs.minority_status_id).select2();
select2.on('select2:select', (event) => {
is_minority_status_other = event.target.value==9?true:false;
$wire.set('application.minority_status_id', event.target.value)
});
}"
    class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps  py-0 px-9 py-lg-0 px-lg-9">

            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.applicant_profile') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.business_profile') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.utility_connections') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 4 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.employees_info') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 4 Nav-->

            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.annual_turnover') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

            <!--begin::Wizard Step 6 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">{!! __('labels.review_submit') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 6 Nav-->

        </div>
    </div>
    <!--end: Wizard Nav-->
    <!--begin: Wizard Body-->
    <div class="row justify-content-center py-10 px-8 py-lg-10 px-lg-9">
        <div class="col-xl-12 col-xxl-12">
            <!--begin: Wizard Form-->
            <form class="form">

                <!--begin: Wizard Step 1-->

                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                      <span>  {!! __('labels.basic_info') !!}</span>
                    </h4>
                    <div class="section_box">


                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.mobile_no') !!}<span class="text-danger"></span>: {{ isset($application['personal_mobile_no'])?$application['personal_mobile_no']:'' }}</label>
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.email_address') !!}<span class="text-danger"></span>: {{ isset($application['personal_email'])?$application['personal_email']:'' }}</label>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.prefix') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($prefixes as $prefix)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.prefix_id" type="radio" name="prefix"
                                                   value="{{ $prefix->id }}">
                                            <span></span>{{ $prefix->prefix_name }}</label>
                                    @endforeach
                                </div>
                                @error('application.prefix_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.first_name') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.first_name" type="text"
                                       class="form-control @error('application.first_name') is-invalid @enderror"
                                       placeholder="First Name"/>
                                @error('application.first_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.middle_name') !!}</label>
                                <input wire:model.defer="application.middle_name" type="text"
                                       class="form-control @error('application.middle_name') is-invalid @enderror"
                                       placeholder="Middle Name"/>
                                @error('application.middle_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.last_name') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.last_name" type="text"
                                       class="form-control @error('application.last_name') is-invalid @enderror"
                                       placeholder="Last Name"/>
                                @error('application.last_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.gender') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($genders as $gender)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.gender_id" type="radio"
                                                   name="gender_id" value="{{ $gender->id }}">
                                            <span></span>{{ $gender->gender_name }}</label>
                                    @endforeach
                                </div>
                                @error('application.gender_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.date_of_birth') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="application.date_of_birth" id="date_of_birth"/>
                                </div>
                                @error('application.date_of_birth')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.cnic_no') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-cnic-mask wire:model.defer="application.cnic_no"/>
                                </div>
                                @error('application.cnic_no')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>{!! __('labels.cnic_issue_date') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="application.cnic_issue_date" id="cnic_issue_date"/>
                                </div>
                                @error('application.cnic_issue_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.cnic_expiry_question') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input @click="is_cnic_lifetime= '{{ $question->name }}'"
                                                   wire:model.defer="application.cnic_expiry_question_id"
                                                   type="radio" name="cnic_expiry_question_id"
                                                   value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.cnic_expiry_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6" x-show.transition.opacity="is_cnic_lifetime=='No'">
                                <label>{!! __('labels.cnic_expiry_date') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="application.cnic_expiry_date"
                                                   id="cnic_expiry_date"/>
                                </div>
                                @error('application.cnic_expiry_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                        <div class="col-lg-6">
                            <label>{!! __('labels.designation_business') !!}<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="application.designation_business_id"
                                                    setFieldName="application.designation_business_id"
                                                    id="designation_business_id" fieldName="name"
                                                    :listing="$designations"/>
                            </div>
                            @error('application.designation_business_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.minority_status_question') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input @click="is_minority_status= '{{ $question->name }}'"
                                                   wire:model.defer="application.minority_status_question_id"
                                                   type="radio" name="minority_status_question_id"
                                                   value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.minority_status_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" x-show.transition.opacity="is_minority_status=='Yes'">

                            <div class="col-lg-6">
                                <label>{!! __('labels.minority_status') !!}
                                    <span class="text-danger">*</span></label>

                                <div wire:ignore>
                                    <select wire:model.defer="application.minority_status_id" x-ref="minority_status_id"
                                            class="form-control select2" style="width: 100% !important;">
                                        <option value="">--- Please Select ---</option>
                                        @foreach($minority_status as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('application.minority_status_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6" x-show.transition.opacity="is_minority_status_other">
                                <label>{!! __('labels.other_than_minority') !!}<span
                                        class="text-danger">*</span></label>
                                <input wire:model.defer="application.minority_status_other" type="text"
                                       class="form-control @error('application.minority_status_other') is-invalid @enderror"
                                       placeholder="Minority Status Other"/>
                                @error('application.minority_status_other')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.national_tax_number') !!}<span
                                        class="text-danger"></span></label>
                                <div wire:ignore>
                                    <input wire:model.defer="application.ntn_personal" type="text"
                                           class="form-control @error('application.ntn_personal') is-invalid @enderror"
                                           placeholder="NTN (Personal)" maxlength="15"/>
                                </div>
                                @error('application.ntn_personal')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.qualification_details') !!}</span></h4>
                    <div class="section_box">
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.education_level') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.education_level_id"
                                                        setFieldName="application.education_level_id"
                                                        id="education_level_id" fieldName="name"
                                                        :listing="$education_level"/>
                                </div>
                                @error('application.education_level_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>{!! __('labels.technical_education_question') !!}<span
                                            class="text-danger">*</span></label>
                                    <div class="radio-inline" wire:ignore>
                                        @foreach($questions as $question)
                                            <label class="radio radio-success">
                                                <input wire:model.defer="application.technical_education_question_id"
                                                       @click="is_technical_education= '{{ $question->name }}'"
                                                       type="radio"
                                                       name="technical_education_question_id"
                                                       value="{{ $question->id }}">
                                                <span></span>{{ $question->name }}</label>
                                        @endforeach
                                    </div>
                                    @error('application.technical_education_question_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div x-show.transition.opacity="is_technical_education=='Yes'">
                                @foreach($technical_educations as $index=>$technical_education)
                                    <div class="mt-10 section_add_more">
                                        <div class="row form-group">
                                            <div class="col-lg-6">
                                                <label>{!! __('labels.technical_education_detail') !!}<span
                                                        class="text-danger">*</span></label>
                                                <input
                                                    wire:model.defer="technical_educations.{{$index}}.certificate_title"
                                                    type="text"
                                                    class="form-control @if($errors->has("technical_educations.$index.certificate_title")) is-invalid @endif"
                                                    placeholder="Diploma/ Certificate Title"/>
                                                @if($errors->has("technical_educations.$index.certificate_title"))
                                                    <div
                                                        class="invalid-feedback d-block">{{ $errors->first("technical_educations.$index.certificate_title") }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                @if($index>0)
                                                    <div class="d-flex justify-content-end">
                                    <span wire:click.prevent="removeTechnicalEducation({{ $index }})"
                                          wire:loading.attr="disabled"
                                          class="btn btn-xs btn-icon px-4 py-4 btn-custom-color">
                            <i class="flaticon2-delete text-white"></i>
                            </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if(count($technical_educations)==($index+1))
                                        <div class="d-flex justify-content-end">
                                            <div class="py-4">
                                                <button type="button"
                                                        wire:click.prevent="addTechnicalEducation"
                                                        wire:loading.class="spinner spinner-white spinner-right"
                                                        wire:loading.attr="disabled"
                                                        class="btn btn-custom-color font-weight-bold px-4 py-2 d-block">
                                                    {!! __('labels.add_more') !!}
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.profession_question') !!}<span
                                        class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.skilled_worker_question_id"
                                                   @click="is_skilled_worker= '{{ $question->name }}'"
                                                   type="radio"
                                                   name="skilled_worker_question_id" value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.skilled_worker_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div
                                x-show.transition.opacity="is_skilled_worker=='Yes'"
                                class="col-lg-6">
                                <label>{!! __('labels.is_skilled_worker') !!}<span
                                        class="text-danger">*</span></label>
                                <input wire:model.defer="application.skill_or_art" type="text"
                                       class="form-control @error('application.skill_or_art') is-invalid @enderror"
                                       placeholder="Skill or Art"/>
                                @error('application.skill_or_art')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>


                    <h4 class="mt-10 font-weight-bold section_heading text-white">
                        <span>{!! __('labels.residence_address') !!}</span></h4>
                    <div class="section_box">
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.property_type') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_address_type_id"
                                                        setFieldName="application.residence_address_type_id"
                                                        id="residence_address_type_id" fieldName="type_name"
                                                        :listing="$address_types"/>
                                </div>
                                @error('application.residence_address_type_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.property_form') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_address_form_id"
                                                        setFieldName="application.residence_address_form_id"
                                                        id="residence_address_form_id" fieldName="form_name"
                                                        :listing="$residence_address_forms"/>
                                </div>

                                @error('application.residence_address_form_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.residence_address_1') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.residence_address_1" type="text"
                                       class="form-control @error('application.residence_address_1') is-invalid @enderror"
                                       placeholder="Address 1"/>
                                @error('application.residence_address_1')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.residence_address_2') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.residence_address_2" type="text"
                                       class="form-control @error('application.residence_address_2') is-invalid @enderror"
                                       placeholder="Address 2"/>
                                @error('application.residence_address_2')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">


                            <div class="col-lg-6">
                                <label>{!! __('labels.residence_address_3') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.residence_address_3" type="text"
                                       class="form-control @error('application.residence_address_3') is-invalid @enderror"
                                       placeholder="Address 3"/>
                                @error('application.residence_address_3')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.province_state') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown
                                        wire:model.defer="application.residence_province_id"
                                        setFieldName="application.residence_province_id"
                                        id="residence_province_id"
                                        fieldName="province_name"
                                        :listing="$provinces"/>
                                </div>
                                @error('application.residence_province_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.city') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_city_id"
                                                        setFieldName="application.residence_city_id"
                                                        id="residence_city_id" fieldName="city_name_e"
                                                        :listing="$residence_cities"/>
                                </div>
                                @error('application.residence_city_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.district') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_district_id"
                                                        setFieldName="application.residence_district_id"
                                                        id="residence_district_id" fieldName="district_name_e"
                                                        :listing="$residence_districts"/>
                                </div>
                                @error('application.residence_district_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.tehsil') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_tehsil_id"
                                                        setFieldName="application.residence_tehsil_id"
                                                        id="residence_tehsil_id" fieldName="tehsil_name_e"
                                                        :listing="$residence_tehsils"/>
                                </div>
                                @error('application.business_tehsil_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.residence_capacity') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.residence_capacity_id"
                                                        setFieldName="application.residence_capacity_id"
                                                        id="residence_capacity_id" fieldName="capacity_name"
                                                        :listing="$address_capacities"/>
                                </div>
                                @error('application.residence_capacity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.share_percentage') !!}<span
                                        class="text-danger">*</span> <i wire:ignore class="fa fa-question-circle text-primary cursor-pointer" onclick="showHelp('residential_share')"></i> </label>
                                <input wire:model.defer="application.residence_share" type="number" min="0" max="100"
                                       class="form-control @error('application.residence_share') is-invalid @enderror"
                                       placeholder="0-100"/>
                                @error('application.residence_share')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.residence_acquisition_date') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="application.residence_acquisition_date"
                                                   id="residence_acquisition_date"/>
                                </div>
                                @error('application.residence_acquisition_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>


                </div>

                <!--end: Wizard Step 1-->

                <!--begin: Wizard Step 2-->

                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span>
                    </h4>

                    <div class="section_box">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.business_name') !!}<span
                                        class="text-danger">*</span></label>
                                <input wire:model.defer="application.business_name" type="text"
                                       class="form-control @error('application.business_name') is-invalid @enderror"
                                       placeholder="Business Name"/>
                                @error('application.business_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.business_acquisition_start_date') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="application.business_establishment_date"
                                                   id="business_establishment_date"/>
                                </div>
                                @error('application.business_establishment_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                            <div class="form-group row">

                                <div class="col-lg-6">
                                    <label>{!! __('labels.business_registration_status') !!}<span
                                            class="text-danger">*</span></label>
                                    <div class="radio-inline" wire:ignore>
                                        @foreach($business_registration_status as $brs)
                                            <label class="radio radio-success">
                                                <input wire:model.defer="application.business_registration_status_id"
                                                       @click="is_business_registered= '{{ $brs->name }}'"
                                                       type="radio"
                                                       name="business_registration_status_id" value="{{ $brs->id }}">
                                                <span></span>{{ $brs->name }}</label>
                                        @endforeach
                                    </div>
                                    @error('application.business_registration_status_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div x-show.transition.opacity="is_business_registered=='Registered'" class="col-lg-6">
                                    <label>{!! __('labels.business_legal_status') !!}<span
                                            class="text-danger">*</span></label>
                                    <div wire:ignore>
                                        <x-select2-dropdown wire:model.defer="application.business_legal_status_id"
                                                            setFieldName="application.business_legal_status_id"
                                                            id="business_legal_status_id" fieldName="legal_name"
                                                            :listing="$business_legal_statuses"/>
                                    </div>
                                    @error('application.business_legal_status_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div x-show.transition.opacity="is_business_registered=='Registered'"
                                 class="form-group row">

                                <div class="col-lg-6">
                                    <label>{!! __('labels.business_registration_no') !!}<span
                                            class="text-danger">*</span></label>
                                    <input wire:model.defer="application.business_registration_number" type="text"
                                           class="form-control @error('application.business_registration_number') is-invalid @enderror"
                                           placeholder="Registration Number"/>
                                    @error('application.business_registration_number')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label>{!! __('labels.business_registration_date') !!}<span
                                            class="text-danger">*</span></label>
                                    <div wire:ignore>
                                        <x-date-picker wire:model.defer="application.business_registration_date"
                                                       id="business_registration_date"/>
                                    </div>
                                    @error('application.business_registration_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div x-show.transition.opacity="is_business_registered=='Registered'"
                                 class="form-group row">
                                <div class="col-lg-6">
                                    <label>{!! __('labels.business_ntn_no') !!}<span
                                            class="text-danger">*</span></label>
                                    <input wire:model.defer="application.business_ntn_no" type="text"
                                           class="form-control @error('application.business_ntn_no') is-invalid @enderror"
                                           placeholder="Business NTN" maxlength="15" />
                                    @error('application.business_ntn_no')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.business_category') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.business_category_id"
                                                        setFieldName="application.business_category_id"
                                                        id="business_category_id" fieldName="category_name"
                                                        :listing="$business_categories"/>
                                </div>
                                @error('application.business_legal_status_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!! __('labels.sector') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-multi-column-select2 :listing="$business_activities"
                                                            wire:model.defer="application.business_activity_id"
                                                            setFieldName="application.business_activity_id"
                                                            id="business_activity_id" fieldName="class_name"/>
                                </div>
                                @error('application.business_activity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.relevent_attachment') !!}</span></h4>
                    <div class="section_box">
                        <div class="form-group row">
                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('labels.ownership_proof') !!}<span
                                        class="text-danger">*</span> <i wire:ignore class="fa fa-question-circle text-primary cursor-pointer" onclick="showHelp('proof_of_ownership_file')"></i></label>

                                @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                                    <br><a href="{{ asset('storage/'.$application['proof_of_ownership_file']) }}"
                                           target="_blank" class="file_viewer" title="Proof of Ownership">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                       onClick="return false;">Change File
                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                           @click="open = false">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="proof_of_ownership_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('proof_of_ownership_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('labels.registration_proof') !!}
                                    &nbsp;<i wire:ignore class="fa fa-question-circle text-primary cursor-pointer" onclick="showHelp('license_registration_file')"></i></label>

                                @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                                    <br><a href="{{ asset('storage/'.$application['license_registration_file']) }}"
                                           target="_blank" class="file_viewer" title="License /Registration">View
                                        File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                       onClick="return false;">Change File
                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                           @click="open = false">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($application['license_registration_file']) && !empty($application['license_registration_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="license_registration_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('license_registration_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div x-show.transition.opacity="is_business_registered=='Registered'"
                             class="form-group row">
                            <div  x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('labels.registration_certificate') !!}<span
                                        class="text-danger">*</span></label>

                                @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                                    <br><a href="{{ asset('storage/'.$application['registration_certificate_file']) }}"
                                           target="_blank" class="file_viewer" title="Registration Certificate">View
                                        File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                       onClick="return false;">Change File
                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                           @click="open = false">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file'])) x-show="open"
                                    @endif type="file" class="form-control" wire:model="registration_certificate_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('registration_certificate_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--Other Documents--}}
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!!__('labels.business_other_documents') !!}<span class="text-danger"></span></label>
                            </div>
                            <div class="col-lg-12">
                            @foreach($business_other_files as $index=>$business_other_file)
                                    <div class="@if($index>0) mt-10 @endif section_add_more">
                                        @if($index>0)
                                            <div class="d-flex justify-content-end">
																		<span wire:click.prevent="removeOtherDocument({{ $index }})"
                                                                              wire:loading.attr="disabled"
                                                                              class="btn btn-xs btn-icon px-4 py-4 btn-custom-color">
														<i class="flaticon2-delete text-white"></i>
														</span>
                                            </div>
                                        @endif
                                        <div class="row form-group">
                                            <div class="col-lg-6">
                                                <label>{!!__('labels.document_title') !!}<span
                                                        class="text-danger"></span></label>
                                                <input
                                                    wire:model.defer="business_other_files.{{$index}}.document_title"
                                                    type="text"
                                                    class="form-control @if($errors->has("business_other_files.$index.document_title")) is-invalid @endif"
                                                    placeholder="Document Title"/>
                                                @if($errors->has("business_other_files.$index.document_title"))
                                                    <div
                                                        class="invalid-feedback d-block">{{ $errors->first("business_other_files.$index.document_title") }}</div>
                                                @endif
                                            </div>

                                            <div class="col-lg-6" x-data="{ open: false }">
                                                <label>{!!__('labels.document') !!}</label>
                                                @if(isset($business_other_file['document_file']) && !empty($business_other_file['document_file']))
                                                    <br><a href="{{ asset('storage/'.$business_other_file['document_file']) }}"
                                                           target="_blank" class="file_viewer" title="{{ $business_other_file['document_title']??'Other Document' }}">View
                                                        File</a>
                                                    &nbsp;|&nbsp;
                                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                                       onClick="return false;">Change File
                                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                                           @click="open = false">Do Not Change File</a>
                                                @endif
                                                <input @if(isset($business_other_file['document_file']) && !empty($business_other_file['document_file'])) x-show="open" @endif
                                                wire:model="business_other_files.{{$index}}.new_document_file" type="file" name="business_other_files.{{$index}}.new_document_file" class="form-control m-input" placeholder="" ><span class="form-text text-muted">Files with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                                @if($errors->has("business_other_files.$index.new_document_file"))
                                                    <div
                                                        class="invalid-feedback d-block">{{ $errors->first("business_other_files.$index.new_document_file") }}</div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    @if(count($business_other_files)==($index+1))
                                        <div class="d-flex justify-content-end">
                                            <div class="py-4">
                                                <button type="button"
                                                        wire:click.prevent="addOtherDocument"
                                                        wire:loading.class="spinner spinner-white spinner-right"
                                                        wire:loading.attr="disabled"
                                                        class="btn btn-custom-color font-weight-bold px-4 py-2 d-block">
                                                   {!!__('labels.add_more') !!}
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                            @endforeach
                            </div>
                        </div>


                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>  {!!__('labels.business_address') !!}</span></h4>
                    <div class="section_box">
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!!__('labels.property_type') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown
                                        wire:model.defer="application.business_address_type_id"
                                        setFieldName="application.business_address_type_id"
                                        id="business_address_type_id"
                                        fieldName="type_name"
                                        :listing="$address_types"/>
                                </div>
                                @error('application.business_address_type_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!!__('labels.property_form') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.business_address_form_id"
                                                        setFieldName="application.business_address_form_id"
                                                        id="business_address_form_id" fieldName="form_name"
                                                        :listing="$business_address_forms"/>
                                </div>

                                @error('application.business_address_form_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.business_address_1') !!}<span class="text-danger">*</span></label>
                                <input wire:model="application.business_address_1" type="text"
                                       class="form-control @error('application.business_address_1') is-invalid @enderror"
                                       placeholder="Address 1"/>
                                @error('application.business_address_1')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.business_address_2') !!}<span class="text-danger">*</span></label>
                                <input wire:model="application.business_address_2" type="text"
                                       class="form-control @error('application.business_address_2') is-invalid @enderror"
                                       placeholder="Address 2"/>
                                @error('application.business_address_2')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.business_address_3') !!}<span class="text-danger">*</span></label>
                                <input wire:model="application.business_address_3" type="text"
                                       class="form-control @error('application.business_address_3') is-invalid @enderror"
                                       placeholder="Address 3"/>
                                @error('application.business_address_3')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.province') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown
                                        wire:model.defer="application.business_province_id"
                                        setFieldName="application.business_province_id"
                                        id="business_province_id"
                                        fieldName="province_name"
                                        :listing="$provinces"/>
                                </div>
                                @error('application.business_province_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.city') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.business_city_id"
                                                        setFieldName="application.business_city_id"
                                                        id="business_city_id" fieldName="city_name_e"
                                                        :listing="$business_cities"/>
                                </div>

                                @error('application.business_city_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.district') !!}<span
                                        class="text-danger">*</span></label>

                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.business_district_id"
                                                        setFieldName="application.business_district_id"
                                                        id="business_district_id" fieldName="district_name_e"
                                                        :listing="$business_districts"/>
                                </div>

                                @error('application.business_district_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.tehsil') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="application.business_tehsil_id"
                                                        setFieldName="application.business_tehsil_id"
                                                        id="business_tehsil_id" fieldName="tehsil_name_e"
                                                        :listing="$business_tehsils"/>
                                </div>
                                @error('application.business_tehsil_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.ownership_capacity_business') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown
                                        wire:model.defer="application.business_capacity_id"
                                        setFieldName="application.business_capacity_id"
                                        id="business_capacity_id"
                                        fieldName="capacity_name"
                                        :listing="$address_capacities"/>
                                </div>
                                @error('application.business_capacity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('labels.share_business_place') !!}<span
                                        class="text-danger">*</span>&nbsp;<i wire:ignore class="fa fa-question-circle text-primary cursor-pointer" onclick="showHelp('business_share')"></i></label>
                                <input wire:model.defer="application.business_share" type="number" min="0" max="100"
                                       class="form-control @error('application.business_share') is-invalid @enderror"
                                       placeholder="0-100"/>
                                @error('application.business_share')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.business_acquisition_date_place') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model="application.business_acquisition_date"
                                                   id="business_acquisition_date"/>
                                </div>
                                @error('application.business_acquisition_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group row">
                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!! __('labels.business_evidence_tenancy') !!}<span
                                        class="text-danger">*</span>&nbsp;<i wire:ignore class="fa fa-question-circle text-primary cursor-pointer" onclick="showHelp('business_evidence_ownership_file')"></i></label>

                                @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                                    <br><a
                                        href="{{ asset('storage/'.$application['business_evidence_ownership_file']) }}"
                                        target="_blank" class="file_viewer" title="Evidence of tenancy/ ownership">View
                                        File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                       onClick="return false;">Change File
                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                           @click="open = false">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file'])) x-show="open"
                                    @endif type="file" class="form-control"
                                    wire:model="business_evidence_ownership_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('business_evidence_ownership_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.business_contact_no') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-input-mask wire:model.defer="application.business_contact_number"
                                                  class="business_contact_number" mask="9999-9999999"
                                                  placeholder="Contact No." isInvalid=""/>
                                </div>
                                @error('application.business_contact_number')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.business_email_address') !!}<span
                                        class="text-danger">*</span></label>
                                <input wire:model.defer="application.business_email" type="email"
                                       class="form-control @error('application.business_email') is-invalid @enderror"
                                       placeholder="Email Address"/>
                                @error('application.business_email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>

                <!--end: Wizard Step 2 -->
                <!--begin: Wizard Step 3 -->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>{!! __('labels.utility_connections_heading') !!}</span></h4>
                    <div class="section_box">

                        <div class="form-group row">

                            <div class="col-lg-12">
                                <label>{!! __('labels.electricity_connection_question') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.utility_connection_question_id"
                                                   @click="is_utility_connection= '{{ $question->name }}'"
                                                   type="radio"
                                                   name="utility_connection_question_id" value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.utility_connection_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        @foreach($utility_connections as $index=>$connection)

                            <div x-show.transition.opacity="is_utility_connection=='Yes' || is_utility_connection=='No'" class="mt-10 section_add_more">
                                @if($index>0)
                                    <div class="d-flex justify-content-end">
                                    <span wire:click.prevent="removeUtilityConnection({{ $index }})"
                                          wire:loading.attr="disabled"
                                          class="btn btn-xs btn-icon px-4 py-4 btn-custom-color">
                            <i class="flaticon2-delete text-white"></i>
                            </span>
                                    </div>
                                @endif


                                    <div class="form-group row" x-show.transition.opacity="is_utility_connection=='No'">
                                        <div class="col-lg-12">
                                            <label>{!! __('labels.type_of_utility') !!}<span class="text-danger">*</span></label>
                                            <div class="radio-inline" wire:ignore>
                                                @foreach($utility_forms as $form)
                                                    <label class="radio radio-success">
                                                        <input
                                                            wire:model.defer="utility_connections.{{$index}}.utility_form_id"
                                                            type="radio"
                                                            @click="$wire.set('utility_connections.{{$index}}.utility_form_id',{{ $form->id }})"
                                                            name="utility_connections.{{$index}}.utility_form_id"
                                                            value="{{ $form->id }}">
                                                        <span></span>{{ $form->form_name }}</label>
                                                @endforeach
                                            </div>
                                            @if($errors->has("utility_connections.$index.utility_form_id"))
                                                <div
                                                    class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_form_id") }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                    <div class="col-lg-7">
                                        <label>{!! __('labels.type_of_connection') !!}<span class="text-danger">*</span></label>
                                        <div class="radio-inline" wire:ignore>
                                            @foreach($utility_types as $type)
                                                <label class="radio radio-success">
                                                    <input
                                                        wire:model.defer="utility_connections.{{$index}}.utility_type_id"
                                                        type="radio"
                                                        name="utility_connections.{{$index}}.utility_type_id"
                                                        value="{{ $type->id }}">
                                                    <span></span>{{ $type->type_name }}</label>
                                            @endforeach
                                        </div>
                                        @if($errors->has("utility_connections.$index.utility_type_id"))
                                            <div
                                                class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_type_id") }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-5">
                                        <label>{!! __('labels.connection_ownership') !!}<span class="text-danger">*</span></label>
                                        <div class="radio-inline" wire:ignore>
                                            @foreach($ownerships as $ownership)
                                                <label class="radio radio-success">
                                                    <input
                                                        wire:model.defer="utility_connections.{{$index}}.connection_ownership_id"
                                                        type="radio"
                                                        name="utility_connections[{{$index}}][connection_ownership_id]"
                                                        value="{{ $ownership->id }}">
                                                    <span></span>{{ $ownership->ownership_name }}</label>
                                            @endforeach
                                        </div>
                                        @if($errors->has("utility_connections.$index.connection_ownership_id"))
                                            <div
                                                class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.connection_ownership_id") }}</div>
                                        @endif
                                    </div>


                                </div>

                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>{!! __('labels.consumer_number') !!}<span class="text-danger">*</span></label>
                                            <input wire:model.defer="utility_connections.{{$index}}.utility_consumer_number"
                                                   type="text"
                                                   class="form-control @if($errors->has("utility_connections.$index.utility_consumer_number")) is-invalid @endif"
                                                   placeholder="Consumer Number"/>
                                            @if($errors->has("utility_connections.$index.utility_consumer_number"))
                                                <div
                                                    class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_consumer_number") }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{!! __('labels.service_provider') !!}<span class="text-danger">*</span></label>
<div wire:ignore>
                                                <x-select2-dropdown
                                                    wire:model.defer="utility_connections.{{ $index }}.utility_service_provider_id"
                                                                    setFieldName="utility_connections.{{ $index }}.utility_service_provider_id"
                                                                    id="utility_service_provider_id_{{ $index }}" fieldName="provider_name"
                                                                    :listing="$utility_service_providers"
                                                />
                                            </div>
                                            @if($errors->has("utility_connections.$index.utility_service_provider_id"))
                                                <div
                                                    class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_service_provider_id") }}</div>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>{!! __('labels.connection_date') !!}<span
                                                    class="text-danger">*</span></label>
                                            <div>
                                                <x-date-picker wire:model.defer="utility_connections.{{$index}}.connection_date"
                                                               id="connection_date_{{$index}}"/>
                                            </div>
                                            @if($errors->has("utility_connections.$index.connection_date"))
                                                <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.connection_date") }}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6"  x-data="{ open: false }">
                                            <label>{!! __('labels.business_paid_bill_file') !!}<span
                                                    class="text-danger">*</span></label>
                                            @if(isset($connection['bill_file']) && !empty($connection['bill_file']))
                                                <br><a href="{{ asset('storage/'.$connection['bill_file']) }}"
                                                       target="_blank" class="file_viewer" title="Utility Bill">View
                                                    File</a>
                                                &nbsp;|&nbsp;
                                                <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                                   onClick="return false;">Change File
                                                </a><a href="javascript:;" onClick="return false;" x-show="open"
                                                       @click="open = false">Do Not Change File</a>
                                            @endif

                                            <input @if(isset($connection['bill_file']) && !empty($connection['bill_file'])) x-show="open" @endif wire:model="utility_connections.{{$index}}.new_bill_file" type="file" name="utility_connections.{{$index}}.new_bill_file" class="form-control m-input" placeholder="" >
                                            <span class="form-text text-muted">Files with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                            @if($errors->has("utility_connections.$index.new_bill_file"))
                                                <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.new_bill_file") }}</div>
                                            @endif
                                        </div>
                                    </div>

                            </div>

                            @if(count($utility_connections)==($index+1))
                                <div x-show.transition.opacity="is_utility_connection=='Yes' || is_utility_connection=='No'">
                                <div class="d-flex justify-content-end">
                                    <div class="py-4">
                                        <button type="button"
                                                wire:click.prevent="addUtilityConnection"
                                                wire:loading.class="spinner spinner-white spinner-right"
                                                wire:loading.attr="disabled"
                                                class="btn btn-custom-color font-weight-bold px-4 py-2 d-block">Add More
                                        </button>
                                    </div>
                                </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!--end: Wizard Step 3 -->

                <!--begin: Wizard Step 4 -->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">

                    <h4 class="font-weight-bold section_heading text-white"><span>  {!!  __('labels.employee_info_heading') !!}</span></h4>
                    <div class="section_box">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label> {!!  __('labels.employees_question') !!}<span
                                        class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.employees_question_id"
                                                   @click="is_employee_info= '{{ $question->name }}'"
                                                   type="radio"
                                                   name="employees_question_id" value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.employees_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if($errors->has("employees.0.employee_type_id"))
                            <div class="alert alert-danger">At least one employee type is required</div>
                        @endif
                        @foreach($employee_types as $index => $employee_type)
                            <div x-show.transition.opacity="is_employee_info=='Yes'"
                                 class="employee_info_div">

                                <div class="form-group row">
                                    <div class="col-lg-4" wire:ignore>
                                        <label class="checkbox checkbox-success">
                                            <input wire:model="employees.{{$index}}.employee_type_id" type="checkbox"
                                                   name="{{ $employee_type->type_name }}"
                                                   value="{{ $employee_type->id }}">
                                            <span></span>&nbsp;{{  $employee_type->type_name }}&nbsp;(<lable class="urdu-label" dir="rtl"> {{ $employee_type->type_name_u }} </lable>)</label>
                                    </div>

                                    <div class="col-lg-8 form-group @if(isset($employees[$index]['employee_type_id']) && $employees[$index]['employee_type_id']!=false) d-box @else d-none @endif">
                                        <div class="row">
                                        @foreach($genders as $gender)
                                            <div class="col-lg-4">
                                                <label>{{ $gender->gender_name }} (<span class="urdu-label"
                                                                                         dir="rtl"> {{ $gender->gender_name_u }} </span>)</label>
                                                <select
                                                    wire:model="employees.{{$index}}.{{strtolower($gender->gender_name)}}"
                                                    class="form-control @error("employees.".$index.'.'.strtolower($gender->gender_name)) is-invalid @enderror">
                                                    <option value="">Select Number</option>
                                                    <option value="0">0</option>

                                                    @for($no=1; $no<=100;$no=$no+10)
                                                        <option value="{{ $no }}&nbsp;-&nbsp;{{ $no+9 }}">{{ $no.'-'.($no+9) }}</option>
                                                    @endfor
                                                </select>
                                                @error("employees.".$index.'.'.strtolower($gender->gender_name))
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>

                                </div>



                            </div>
                        @endforeach
                    </div>
                </div>
                <!--end: Wizard Step 4 -->

                <!--begin: Wizard Step 5 -->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                    <!--begin::Section-->

                    <h4 class="font-weight-bold section_heading text-white"><span>{!! __('labels.estimated_annual_turnover') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('labels.fiscal_year') !!} <span class="text-danger">*</span></label>
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
                                <label>{!! __('labels.annual_turnover_fiscal_year') !!} <span class="text-danger">*</span></label>
                                <input wire:model.model.defer="application.annual_turnover" type="text" class="form-control @error('application.annual_turnover') is-invalid @enderror" placeholder="Annual Turnover" />
                                @error('application.annual_turnover')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6" x-data="{ open: false }">
                                <label>{!! __('labels.business_account_statement') !!} </label>

                                @if(isset($application['business_account_statement_file']) && !empty($application['business_account_statement_file']))
                                    <br><a href="{{ asset('storage/'.$application['business_account_statement_file']) }}"
                                           target="_blank" class="file_viewer" title="Business Account Statement">View
                                        File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;" class="show_file" x-show="!open"
                                       onClick="return false;">Change File
                                    </a><a href="javascript:;" onClick="return false;" x-show="open"
                                           @click="open = false">Do Not Change File</a>
                                @endif

                                <input type="file" class="form-control" wire:model="business_account_statement_file" @if(isset($application['business_account_statement_file']) && !empty($application['business_account_statement_file'])) x-show="open" @endif >
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.exports') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!! __('labels.question_exports') !!} <span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.export_question_id"
                                                   @click="is_annual_export= '{{ $question->name }}'"
                                                   type="radio"
                                                   name="export_question_id" value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.export_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group row"  x-show.transition.opacity="is_annual_export=='Yes'">
                        <div class="col-lg-6">
                            <label>{!! __('labels.fiscal_year') !!} <span class="text-danger">*</span></label>
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
                            <label>{!! __('labels.currency') !!} <span class="text-danger">*</span></label>
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
                    <div class="form-group row"  x-show.transition.opacity="is_annual_export=='Yes'">

                        <div class="col-lg-6">
                            <label>{!! __('labels.export_turnover') !!} <span class="text-danger">*</span></label>
                            <input wire:model.defer="application.export_annual_turnover" type="text" class="form-control @error('application.export_annual_turnover') is-invalid @enderror" placeholder="Export Annual Turnover" />
                            @error('application.export_annual_turnover')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.imports') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!! __('labels.question_imports') !!}<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($questions as $question)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="application.import_question_id"
                                                   @click="is_annual_import= '{{ $question->name }}'"
                                                   type="radio"
                                                   name="import_question_id" value="{{ $question->id }}">
                                            <span></span>{{ $question->name }}</label>
                                    @endforeach
                                </div>
                                @error('application.import_question_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"  x-show.transition.opacity="is_annual_import=='Yes'">
                            <div class="col-lg-6">
                                <label>{!! __('labels.fiscal_year') !!} <span class="text-danger">*</span></label>
                                <select wire:model.defer="application.import_fiscal_year_id"  class="form-control @error('application.export_fiscal_year_id') is-invalid @enderror">
                                    <option value="">Select Year</option>
                                    @foreach($fiscal_years as $year)
                                        <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                    @endforeach
                                </select>
                                @error('application.import_fiscal_year_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('labels.currency') !!} <span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($currencies as $currency)
                                        <label class="radio">
                                            <input wire:model.defer="application.import_currency_id" type="radio" name="application.import_currency_id" value="{{ $currency->id }}">
                                            <span></span>{{ $currency->currency_name }}</label>
                                    @endforeach
                                </div>
                                @error('application.import_currency_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" x-show.transition.opacity="is_annual_import=='Yes'">

                            <div class="col-lg-6">
                                <label>{!! __('labels.import_turnover') !!} <span class="text-danger">*</span></label>
                                <input wire:model.defer="application.import_annual_turnover" type="text" class="form-control @error('application.import_annual_turnover') is-invalid @enderror" placeholder="Import Annual Turnover" />
                                @error('application.import_annual_turnover')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <!--end: Wizard Step 5 -->

                <!--begin: Wizard Step 5-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                    <!--begin::Section-->
                    <h4 class="main_section_heading">{!! __('labels.review_applicant_profile') !!}
                    </h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.basic_info') !!}</span></h4>

                    <div class="section_box">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.first_name') !!}<span
                                        class="text-danger">*</span></span>
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
                                <span class="font-weight-bolder mb-2">{!! __('labels.last_name') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['last_name'])?$application['last_name']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.gender') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['gender_id'])?getCollectionTitle($genders,'gender_name',$application['gender_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_no') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['cnic_no'])?$application['cnic_no']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_issue_date') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['cnic_issue_date'])?$application['cnic_issue_date']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.cnic_expiry_date') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['cnic_expiry_date'])?$application['cnic_expiry_date']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.date_of_birth') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['date_of_birth'])?$application['date_of_birth']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.designation_business') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['designation_business_id'])?getCollectionTitle($designations,'name',$application['designation_business_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.minority_status_question') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['minority_status_question_id'])?getCollectionTitle($questions,'name',$application['minority_status_question_id']):'' }}</span>
                            </div>
                            <div
                                :class="{'d-none-imp': is_minority_status=='No'}"
                                class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.minority_status') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['minority_status_id'])?getCollectionTitle($minority_status,'name',$application['minority_status_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div
                                :class="{'d-none-imp': !is_minority_status_other || is_minority_status=='No'}"
                                class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.other_than_minority') !!}<span
                                        class="text-danger">*</span></span>
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
                                <span class="font-weight-bolder mb-2">{!! __('labels.education_level') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['education_level_id'])?getCollectionTitle($education_level,'name',$application['education_level_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.technical_education_question') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['technical_education_question_id'])?getCollectionTitle($questions,'name',$application['technical_education_question_id']):'' }}</span>
                            </div>
                        </div>
                        @foreach($technical_educations as $index=>$technical_education)
                            <div
                                :class="{'d-none-imp': is_technical_education=='No'}"
                                class="d-flex justify-content-between pt-5">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.technical_education_detail') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($technical_education['certificate_title'])?$technical_education['certificate_title']:'' }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.profession_question') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['skilled_worker_question_id'])?getCollectionTitle($questions,'name',$application['skilled_worker_question_id']):'' }}</span>
                            </div>
                            <div
                                :class="{'d-none-imp': is_skilled_worker=='No'}"
                                class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.is_skilled_worker') !!}<span
                                        class="text-danger">*</span></span>
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
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['residence_address_type_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_address_form_id'])?getCollectionTitle($residence_address_forms,'form_name',$application['residence_address_form_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_1') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_address_1'])?$application['residence_address_1']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_2') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_address_2'])?$application['residence_address_2']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_address_3') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_address_3'])?$application['residence_address_3']:'' }}</span>
                            </div>

                            <div class="d-flex flex-column flex-root">
								<span class="font-weight-bolder mb-2">{!! __('labels.province') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_province_id'])?getCollectionTitle($provinces,'province_name',$application['residence_province_id']):'' }}</span>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.city') !!}<span
                                        class="text-danger">*</span></span>
                            <span
                                class="opacity-70">{{ isset($application['residence_city_id'])?getCollectionTitle($residence_cities,'city_name_e',$application['residence_city_id']):'' }}</span>
                        </div>

                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_district_id'])?getCollectionTitle($residence_districts,'district_name_e',$application['residence_district_id']):'' }}</span>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between pt-5">

                            <div class="d-flex flex-column flex-root">
															<span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}<span
                                                                    class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_tehsil_id'])?getCollectionTitle($residence_tehsils,'tehsil_name_e',$application['residence_tehsil_id']):'' }}</span>
                            </div>

                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_capacity') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['residence_capacity_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_percentage') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_share'])?$application['residence_share']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_acquisition_date') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['residence_acquisition_date'])?$application['residence_acquisition_date']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.mobile_no') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['personal_mobile_no'])?$application['personal_mobile_no']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.email_address') !!}<span
                                        class="text-danger">*</span></span>
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
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_name') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_name'])?$application['business_name']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_start_date') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_establishment_date'])?$application['business_establishment_date']:'' }}</span>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_status') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_registration_status_id'])?getCollectionTitle($business_registration_status,'name',$application['business_registration_status_id']):'' }}</span>
                            </div>
                        </div>
                        <div
                            :class="{'d-none-imp': is_business_registered=='Registered'}"
                            class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_legal_status') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_legal_status_id'])?getCollectionTitle($business_legal_statuses,'legal_name',$application['business_legal_status_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_no') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
                            </div>

                        </div>
                        <div
                            :class="{'d-none-imp': is_business_registered=='Registered'}"
                            class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_registration_date') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_registration_date'])?$application['business_registration_date']:'' }}</span>
                            </div>

                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_ntn_no') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_ntn_no'])?$application['business_ntn_no']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_category') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'section_name',$application['business_activity_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sector') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'group_name',$application['business_activity_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_sub_sector') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'class_name',$application['business_activity_id']):'' }}</span>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.relevent_attachment') !!}</span></h4>
                    <div class="section_box">
                        <div class="d-flex justify-content-between">
                            @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.ownership_proof') !!}<span
                                            class="text-danger">*</span></span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['proof_of_ownership_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                                </div>
                            @endif

                            @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.registration_proof') !!} </span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['license_registration_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                                </div>
                            @endif

                        </div>
                        <div
                            :class="{'d-none-imp': is_business_registered=='Registered'}"
                            class="d-flex justify-content-between pt-5">
                            @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.registration_certificate') !!}<span
                                            class="text-danger">*</span></span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['registration_certificate_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                                </div>
                            @endif

                        </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>{!! __('labels.business_address') !!}</span></h4>
                    <div class="section_box">
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_type') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['business_address_type_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.property_form') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_address_form_id'])?getCollectionTitle($business_address_forms,'form_name',$application['business_address_form_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_1') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_address_1'])?$application['business_address_1']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_2') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_address_2'])?$application['business_address_2']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_address_3') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_address_3'])?$application['business_address_3']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.province') !!}<span
                                        class="text-danger">*</span></span>
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
                                <span class="font-weight-bolder mb-2">{!! __('labels.district') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_district_id'])?getCollectionTitle($business_districts,'district_name_e',$application['business_district_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.tehsil') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_tehsil_id'])?getCollectionTitle($business_tehsils,'tehsil_name_e',$application['business_tehsil_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.residence_capacity') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['business_capacity_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.share_business_place') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_share'])?$application['business_share']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_acquisition_date_place') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_acquisition_date'])?$application['business_acquisition_date']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_evidence_tenancy') !!}<span
                                            class="text-danger">*</span></span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['business_evidence_ownership_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                                </div>
                            @endif
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_contact_no') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['business_contact_number'])?$application['business_contact_number']:'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.business_email_address') !!}<span
                                        class="text-danger">*</span></span>
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
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.utility_connections_question') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['utility_connection_question_id'])?getCollectionTitle($questions,'name',$application['utility_connection_question_id']):'' }}</span>
                            </div>
                        </div>

                        @foreach($utility_connections as $index=>$connection)
                            <div class="d-flex justify-content-between pt-5">

                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_utility') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['utility_form_id'])?getCollectionTitle($utility_forms,'form_name',$connection['utility_form_id']):'' }}</span>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between pt-5">

                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.type_of_connection') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['utility_type_id'])?getCollectionTitle($utility_types,'type_name',$connection['utility_type_id']):'' }}</span>
                                </div>

                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.connection_ownership') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['connection_ownership_id'])?getCollectionTitle($ownerships,'ownership_name',$connection['connection_ownership_id']):'' }}</span>
                                </div>


                            </div>

                            <div class="d-flex justify-content-between pt-5">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.consumer_number') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['utility_consumer_number'])?$connection['utility_consumer_number']:'' }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.service_provider') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['utility_provider_id'])?getCollectionTitle($utility_service_providers,'provider_name',$connection['utility_provider_id']):'' }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pt-5">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.connection_date') !!}<span
                                            class="text-danger">*</span></span>
                                    <span
                                        class="opacity-70">{{ isset($connection['connection_date'])?$connection['connection_date']:'' }}</span>
                                </div>

                                @if(isset($connection['bill_file']) && !empty($connection['bill_file']))
                                    <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_paid_bill_file') !!}<span
                                            class="text-danger">*</span></span>
                                        <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($connection['bill_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
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
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{!! __('labels.employees_question') !!}<span
                                        class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['employees_question_id'])?getCollectionTitle($questions,'name',$application['employees_question_id']):'' }}</span>
                            </div>
                        </div>

                            <div x-show="is_employee_info=='Yes'">
                            @foreach($employees as $employee)
                                <h6 class="mb-4 mt-5 font-weight-bold text-dark">{{ isset($employee['employee_type_id'])?getCollectionTitle($employee_types,'type_name',$employee['employee_type_id']):'' }}
                                    &nbsp;(<span class="urdu-label"
                                                 dir="rtl"> {{ isset($employee['employee_type_id'])?getCollectionTitle($employee_types,'type_name_u',$employee['employee_type_id']):'' }} </span>)
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
                            </div>

                    </div>

                    <h4 class="mt-10 main_section_heading">{!! __('labels.turnover_heading') !!}
                    </h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white">
                        <span>{!! __('labels.estimated_annual_turnover') !!}</span></h4>
                    <div class="section_box">
                        <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}<span
                                            class="text-danger">*</span></span>
                            <span
                                class="opacity-70">{{ isset($application['turnover_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['turnover_fiscal_year_id']):'' }}</span>
                        </div>

                        <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.annual_turnover_fiscal_year') !!}<span
                                            class="text-danger">*</span></span>
                            <span
                                class="opacity-70">{{ isset($application['annual_turnover'])?$application['annual_turnover']:'' }}</span>
                        </div>
                        </div>

                        <div class="d-flex justify-content-between pt-5">

                            @if(isset($application['business_account_statement_file']) && !empty($application['business_account_statement_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.business_account_statement') !!}<span
                                            class="text-danger">*</span></span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['business_account_statement_file']) }}"
                                   target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
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
                                    <span class="font-weight-bolder mb-2">{!! __('labels.question_exports') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['export_question_id'])?getCollectionTitle($questions,'name',$application['export_question_id']):'' }}</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['export_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['export_fiscal_year_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['export_currency_id'])?getCollectionTitle($currencies,'currency_name',$application['export_currency_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.export_turnover') !!}<span
                                            class="text-danger">*</span></span>
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
                                    <span class="font-weight-bolder mb-2">{!! __('labels.question_imports') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['import_question_id'])?getCollectionTitle($questions,'name',$application['import_question_id']):'' }}</span>
                            </div>


                        </div>


                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.fiscal_year') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['import_fiscal_year_id'])?getCollectionTitle($fiscal_years,'year_name',$application['import_fiscal_year_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.currency') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['import_currency_id'])?getCollectionTitle($currencies,'currency_name',$application['import_currency_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">{!! __('labels.import_turnover') !!}<span
                                            class="text-danger">*</span></span>
                                <span
                                    class="opacity-70">{{ isset($application['import_annual_turnover'])?$application['import_annual_turnover']:'' }}</span>
                            </div>
                        </div>



                    </div>


                    <!--end::Section-->
                </div>
                <!--end: Wizard Step 5 -->

                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        @if($step> 0 && $step<=5)
                            <button type="button"
                                    class="btn btn-custom-dark font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-prev"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:click.prevent="decreaseStep"
                                    wire:loading.attr="disabled">{!! __('labels.previous') !!}
                            </button>
                        @endif
                    </div>
                    <div>
                        @if($step >= 5)
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-submit"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="submitApplication">{!! __('labels.submit_form') !!}
                            </button>
                        @else
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-next"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="submitApplication"
                            >{!! __('labels.save_and_next') !!}
                            </button>
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

