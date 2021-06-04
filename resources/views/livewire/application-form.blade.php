<div x-data class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps  py-0 px-9 py-lg-0 px-lg-9">

            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">Applicant Profile</h3>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">Business Profile</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">Utility Connections</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">Employees Info</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step" data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                <div class="wizard-label">
                    <h3 class="wizard-title">Review and Submit</h3>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

        </div>
    </div>
    <!--end: Wizard Nav-->
    <!--begin: Wizard Body-->
    <div class="row justify-content-center py-10 px-8 py-lg-10 px-lg-9">
        <div class="col-xl-12 col-xxl-12">
            <!--begin: Wizard Form-->
            <form  class="form" >

                <!--begin: Wizard Step 1-->

                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>BASIC INFO (<label class="urdu-label" dir="rtl"> تعلیمی تفصیلات </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Prefix: (<span class="urdu-label" dir="rtl"> ٹائٹل </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($prefixes as $prefix)
                                    <label class="radio radio-success">
                                        <input wire:model.defer="application.prefix_id" type="radio" name="prefix" value="{{ $prefix->id }}">
                                        <span></span>{{ $prefix->prefix_name }}</label>
                                @endforeach
                            </div>
                            @error('application.prefix_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>First Name: (<span class="urdu-label" dir="rtl"> پہلا نام </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.first_name" type="text" class="form-control @error('application.first_name') is-invalid @enderror" placeholder="First Name" />
                            @error('application.first_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Middle Name: (<span class="urdu-label" dir="rtl"> درمیانی نام </span>)</label>
                            <input wire:model.defer="application.middle_name" type="text" class="form-control @error('application.middle_name') is-invalid @enderror" placeholder="Middle Name" />
                            @error('application.middle_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Last Name: (<span class="urdu-label" dir="rtl"> آخری نام </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.last_name" type="text" class="form-control @error('application.last_name') is-invalid @enderror" placeholder="Last Name" />
                            @error('application.last_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Gender: (<span class="urdu-label" dir="rtl"> جنس </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($genders as $gender)
                                    <label class="radio radio-success">
                                        <input wire:model.defer="application.gender_id" type="radio" name="gender_id" value="{{ $gender->id }}">
                                        <span></span>{{ $gender->gender_name }}</label>
                                @endforeach
                            </div>
                            @error('application.gender_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Date of Birth: (<span class="urdu-label" dir="rtl"> تاریخ پیدائش (کمپیوٹرائزڈ قومی شناختی کارڈ کے مطابق) </span>)<span class="text-danger">*</span></label>
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
                            <label>CNIC No. (<span class="urdu-label" dir="rtl"> قومی شناختی کارڈ نمبر </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-cnic-mask wire:model.defer="application.cnic_no" />
                            </div>
                            @error('application.cnic_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label>CNIC Issue Date: (<span class="urdu-label" dir="rtl"> شناختی کارڈ کے اجراء کی تاریخ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-date-picker wire:model.defer="application.cnic_issue_date" id="cnic_issue_date" />
                            </div>
                            @error('application.cnic_issue_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>CNIC Expiry Date: (<span class="urdu-label" dir="rtl"> شناختی کارڈ کی میعاد ختم ہونے کی تاریخ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-date-picker wire:model.defer="application.cnic_expiry_date" id="cnic_expiry_date" />
                            </div>
                            @error('application.cnic_expiry_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Designation in Business: (<span class="urdu-label" dir="rtl"> کاروبار میں عہدہ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model.defer="application.designation_business_id" setFieldName="application.designation_business_id" id="designation_business_id" fieldName="name" :listing="$designations" />
                            </div>
                            @error('application.designation_business_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Do you have Minority Status? (<span class="urdu-label" dir="rtl"> کیا آپ کو اقلیت کا درجہ حاصل ہے؟ </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($questions as $question)
                                    <label class="radio radio-success">
                                        <input wire:model="application.minority_status_question_id" type="radio" name="minority_status_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.minority_status_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row @if(!$is_minority_status) d-none @endif">

                        <div class="col-lg-6">
                            <label>Minority Status: (<span class="urdu-label" dir="rtl"> اقلیت </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model="application.minority_status_id" setFieldName="application.minority_status_id" id="minority_status_id" fieldName="name" :listing="$minority_status" />
                            </div>
                            @error('application.minority_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_minority_status || !$is_minority_status_other) d-none @endif">
                            <label>Other: (<span class="urdu-label" dir="rtl"> دیگر </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.minority_status_other" type="text" class="form-control @error('application.minority_status_other') is-invalid @enderror" placeholder="Minority Status Other" />
                            @error('application.minority_status_other')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>National Tax Number (Personal): (<span class="urdu-label" dir="rtl"> قومی ٹیکس نمبر (ذاتی) </span>)<span class="text-danger"></span></label>
                            <div wire:ignore>
                            <input wire:model.defer="application.ntn_personal" type="text" class="form-control @error('application.ntn_personal') is-invalid @enderror" placeholder="NTN (Personal)" />
                            </div>
                            @error('application.ntn_personal')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>QUALIFICATION DETAILS (<label class="urdu-label" dir="rtl"> تعلیمی تفصیلات </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Education Level: (<span class="urdu-label" dir="rtl"> تعلیمی قابلیت </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model.defer="application.education_level_id" setFieldName="application.education_level_id" id="education_level_id" fieldName="name" :listing="$education_level" />
                            </div>
                            @error('application.education_level_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Do you have any Technical Education? (<span class="urdu-label" dir="rtl"> تکنیکی تعلیم </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($questions as $question)
                                    <label class="radio radio-success">
                                        <input wire:model="application.technical_education_question_id" type="radio" name="technical_education_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.technical_education_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    @foreach($technical_educations as $index=>$technical_education)
                            <div class="mt-10 section_add_more  @if(!$is_technical_education) d-none @endif">
                            <div class="row form-group @if(!$is_technical_education) d-none @endif">
                        <div class="col-lg-6">
                            <label>Diploma/ Certificate Title: (<span class="urdu-label" dir="rtl"> ڈپلومہ / سرٹیفکیٹ کا عنوان </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="technical_educations.{{$index}}.certificate_title" type="text" class="form-control @if($errors->has("technical_educations.$index.certificate_title")) is-invalid @endif" placeholder="Diploma/ Certificate Title" />
                            @if($errors->has("technical_educations.$index.certificate_title"))
                                <div class="invalid-feedback d-block">{{ $errors->first("technical_educations.$index.certificate_title") }}</div>
                            @endif
                        </div>
                                <div class="col-lg-6">
                                    @if($index>0)
                                        <div class="d-flex justify-content-end">
                                    <span wire:click.prevent="removeTechnicalEducation({{ $index }})" wire:loading.attr="disabled"  class="btn btn-xs btn-icon px-4 py-4 btn-custom-color">
                            <i class="flaticon2-delete text-white"></i>
                            </span>
                                        </div>
                                    @endif
                                </div>
                    </div>
                            </div>

                            @if(count($technical_educations)==($index+1))
                                <div class="d-flex justify-content-end @if(!$is_technical_education) d-none-imp @endif">
                                    <div class="py-4">
                                        <button type="button" wire:click.prevent="addTechnicalEducation" wire:loading.attr="disabled" class="btn btn-custom-color font-weight-bold px-4 py-2 d-block">Add More</button>
                                    </div>
                                </div>
                            @endif

                    @endforeach

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Are you a skilled worker or an artisan? (<span class="urdu-label" dir="rtl"> ہنر مند یا کاریگر </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($questions as $question)
                                    <label class="radio radio-success">
                                        <input wire:model="application.skilled_worker_question_id" type="radio" name="skilled_worker_question_id" value="{{ $question->id }}">
                                        <span></span>{{ $question->name }}</label>
                                @endforeach
                            </div>
                            @error('application.skilled_worker_question_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_skilled_worker) d-none @endif">
                            <label>Skill or Art: (<span class="urdu-label" dir="rtl"> ہنر یا فن کی وضاحت کریں </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.skill_or_art" type="text" class="form-control @error('application.skill_or_art') is-invalid @enderror" placeholder="Skill or Art" />
                            @error('application.skill_or_art')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    </div>


                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RESIDENCE ADDRESS (LOCAL) (<label class="urdu-label" dir="rtl"> رہائش کا پتہ (مقامی) </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Type of Property: (<span class="urdu-label" dir="rtl"> پراپرٹی کی قسم </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model="application.residence_address_type_id" setFieldName="application.residence_address_type_id" id="residence_address_type_id" fieldName="type_name" :listing="$address_types" />
                            </div>
                            @error('application.residence_address_type_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Form of Property: (<span class="urdu-label" dir="rtl"> پراپرٹی کی ذیلی قسم </span>)<span class="text-danger">*</span></label>
                            <select wire:model.defer="application.residence_address_form_id"  class="form-control @error('application.residence_address_form_id') is-invalid @enderror">
                                <option value="">Select Form</option>
                                @foreach($residence_address_forms as $form)
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
                            <label>Unit / Address 1: (<span class="urdu-label" dir="rtl"> مکان نمبر / یونٹ نمبر/ گاؤں / حدود نمبر </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.residence_address_1" type="text" class="form-control @error('application.residence_address_1') is-invalid @enderror" placeholder="Address 1" />
                            @error('application.residence_address_1')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Complex / Street / Address 2: (<span class="urdu-label" dir="rtl"> کمپلکس/ گلی/ بلاک/ سیکٹر </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.residence_address_2" type="text" class="form-control @error('application.residence_address_2') is-invalid @enderror" placeholder="Address 2" />
                            @error('application.residence_address_2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">


                        <div class="col-lg-6">
                            <label>Area/ Locality / Address 3: (<span class="urdu-label" dir="rtl"> علاقہ/ سڑک/ گاؤں </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.residence_address_3" type="text" class="form-control @error('application.residence_address_3') is-invalid @enderror" placeholder="Address 3" />
                            @error('application.residence_address_3')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>City: (<span class="urdu-label" dir="rtl"> شہر </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model.defer="application.residence_city_id" setFieldName="application.residence_city_id" id="residence_city_id" fieldName="city_name_e" :listing="$cities" />
                            </div>
                            @error('application.residence_city_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>District: (<span class="urdu-label" dir="rtl"> ضلع </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model.defer="application.residence_district_id" setFieldName="application.residence_district_id" id="residence_district_id" fieldName="district_name_e" :listing="$districts" />
                            </div>
                            @error('application.residence_district_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Capacity: (<span class="urdu-label" dir="rtl"> ملکیت کی قسم </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-select2-dropdown wire:model.defer="application.residence_capacity_id" setFieldName="application.residence_capacity_id" id="residence_capacity_id" fieldName="capacity_name" :listing="$address_capacities" />
                            </div>
                            @error('application.residence_capacity_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Share %: (<span class="urdu-label" dir="rtl"> حصہ فیصد </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.residence_share" type="number" min="0" max="100" class="form-control @error('application.residence_share') is-invalid @enderror" placeholder="0-100" />
                            @error('application.residence_share')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Acquisition Date: (<span class="urdu-label" dir="rtl"> حصول کی تاریخ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-date-picker wire:model.defer="application.residence_acquisition_date" id="residence_acquisition_date" />
                            </div>
                            @error('application.residence_acquisition_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Mobile No. (<span class="urdu-label" dir="rtl"> موبائل نمبر </span>)<span class="text-danger"></span></label>
                            <input readonly wire:model.defer="application.personal_mobile_no" type="text" class="border-0 pl-0 form-control @error('application.personal_mobile_no') is-invalid @enderror" placeholder="Mobile No." />
                            @error('application.personal_mobile_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Email Address: (<span class="urdu-label" dir="rtl"> ای میل اڈریس </span>)<span class="text-danger"></span></label>
                            <input readonly wire:model.defer="application.personal_email" type="text" class="border-0 pl-0 form-control @error('application.personal_email') is-invalid @enderror" placeholder="Email Address" />
                            @error('application.personal_email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    </div>


                </div>

                <!--end: Wizard Step 1-->

                <!--begin: Wizard Step 2-->

                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>BASIC INFO (<label class="urdu-label" dir="rtl"> تعلیمی تفصیلات </label>)</span></h4>

                    <div class="section_box">
                    <div class="form-group row">
                        <div class="col-lg-6">
                                <label>Business Name: (<span class="urdu-label" dir="rtl"> کاروبار کا نام </span>)<span class="text-danger">*</span></label>
                                <input wire:model.defer="application.business_name" type="text" class="form-control @error('application.business_name') is-invalid @enderror" placeholder="Business Name" />
                                @error('application.business_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Acquisition/ Start Date: (<span class="urdu-label" dir="rtl"> کاروبار کے قیام / حصول / آغاز کی تاریخ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-date-picker wire:model.defer="application.business_establishment_date" id="business_establishment_date" />
                            </div>
                            @error('application.business_establishment_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Business Registration Status: (<span class="urdu-label" dir="rtl"> بزنس رجسٹریشن کی حیثیت </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="application.business_registration_status_id" setFieldName="application.business_registration_status_id" id="business_registration_status_id" fieldName="name" :listing="$business_registration_status" />
                            </div>
                            @error('application.business_registration_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 @if(!$is_business_registered) d-none @endif">
                            <label>Legal Status of Business: (<span class="urdu-label" dir="rtl"> کاروباری اندراج کی قانونی حیثیت </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown wire:model.defer="application.business_legal_status_id" setFieldName="application.business_legal_status_id" id="business_legal_status_id" fieldName="legal_name" :listing="$business_legal_statuses" />
                            </div>
                            @error('application.business_legal_status_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row @if(!$is_business_registered) d-none @endif">

                        <div class="col-lg-6">
                            <label>Business Registration Number: (<span class="urdu-label" dir="rtl"> بزنس رجسٹریشن نمبر </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.business_registration_number" type="text" class="form-control @error('application.business_registration_number') is-invalid @enderror" placeholder="Registration Number" />
                            @error('application.business_registration_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Business Registration Date: (<span class="urdu-label" dir="rtl"> کاروبار کے اندراج کی تاریخ </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                            <x-date-picker wire:model.defer="application.business_registration_date" id="business_registration_date" />
                            </div>
                            @error('application.business_registration_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row  @if(!$is_business_registered) d-none @endif">
                        <div class="col-lg-6">
                            <label>Business NTN: (<span class="urdu-label" dir="rtl"> کاروبار کا قومی ٹیکس نمبر </span>)<span class="text-danger">*</span></label>
                            <input wire:model.defer="application.business_ntn_no" type="text" class="form-control @error('application.business_ntn_no') is-invalid @enderror" placeholder="Business NTN" />
                            @error('application.business_ntn_no')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>Business Category: (<span class="urdu-label" dir="rtl"> کاروبار کی قسم </span>)<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                <x-multi-column-select2 :listing="$business_activities" wire:model.defer="application.business_activity_id" setFieldName="application.business_activity_id" id="business_activity_id" fieldName="class_name" />
                                </div>
                                @error('application.business_activity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RELEVANT ATTACHMENTS (<label class="urdu-label" dir="rtl"> مطلوبہ دستاویزات </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">
                        <div x-data="{ open: false }" class="col-lg-6">
                            <label>Upload Proof of Ownership: (<span class="urdu-label" dir="rtl"> ملکیت کا ثبوت اپ لوڈ کریں </span>)<span class="text-danger">*</span></label>

                            @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                                <br><a href="{{ asset('storage/'.$application['proof_of_ownership_file']) }}" target="_blank" class="file_viewer" title="Proof of Ownership">View File</a>
                            &nbsp;|&nbsp;
                            <a @click="open = true" href="javascript:;" class="show_file" x-show="!open" onClick="return false;">Change File
                            </a><a href="javascript:;" onClick="return false;" x-show="open" @click="open = false">Do Not Change File</a>
                            @endif

                            <input @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file'])) x-show="open" @endif  type="file" class="form-control" wire:model="proof_of_ownership_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                            @error('proof_of_ownership_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div x-data="{ open: false }" class="col-lg-6">
                            <label>License /Registration with chamber or Trade body:<br>(<span class="urdu-label" dir="rtl"> چیمبر یا تجارتی ادارہ کے ساتھ لائسنس / رجسٹریشن کا سرٹیفکیٹ اپ لوڈ کریں </span>) </label>

                            @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                                <br><a href="{{ asset('storage/'.$application['license_registration_file']) }}" target="_blank" class="file_viewer" title="License /Registration">View File</a>
                                &nbsp;|&nbsp;
                                <a @click="open = true" href="javascript:;" class="show_file" x-show="!open" onClick="return false;">Change File
                                </a><a href="javascript:;" onClick="return false;" x-show="open" @click="open = false">Do Not Change File</a>
                            @endif

                            <input  @if(isset($application['license_registration_file']) && !empty($application['license_registration_file'])) x-show="open" @endif  type="file" class="form-control" wire:model="license_registration_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                            @error('license_registration_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div x-data="{ open: false }" class="form-group row  @if(!$is_business_registered) d-none @endif">
                        <div class="col-lg-6">
                            <label>Upload Registration Certificate: (<span class="urdu-label" dir="rtl"> رجسٹریشن سرٹیفکیٹ اپ لوڈ کریں </span>)<span class="text-danger">*</span></label>

                            @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                                <br><a href="{{ asset('storage/'.$application['registration_certificate_file']) }}" target="_blank" class="file_viewer" title="Registration Certificate">View File</a>
                                &nbsp;|&nbsp;
                                <a @click="open = true" href="javascript:;" class="show_file" x-show="!open" onClick="return false;">Change File
                                </a><a href="javascript:;" onClick="return false;" x-show="open" @click="open = false">Do Not Change File</a>
                            @endif

                            <input @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file'])) x-show="open" @endif type="file" class="form-control" wire:model="registration_certificate_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                            @error('registration_certificate_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BUSINESS ADDRESS (<label class="urdu-label" dir="rtl"> کاروباری پتہ </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Type of Property: (<span class="urdu-label" dir="rtl"> پراپرٹی کی قسم </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown
                                    wire:model.defer="application.business_address_type_id"
                                    setFieldName="application.business_address_type_id"
                                    id="business_address_type_id"
                                    fieldName="type_name"
                                    :listing="$address_types" />
                            </div>
                            @error('application.business_address_type_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Form of Property: (<span class="urdu-label" dir="rtl"> پراپرٹی کی ذیلی قسم </span>)<span class="text-danger">*</span></label>
                            <select wire:model="application.business_address_form_id"  class="form-control @error('application.business_address_form_id') is-invalid @enderror">
                                <option value="">Select Form</option>
                                @foreach($business_address_forms as $form)
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
                            <label>Unit / Address 1: (<span class="urdu-label" dir="rtl"> یونٹ نمبر/ گاؤں / حدود نمبر </span>)<span class="text-danger">*</span></label>
                            <input wire:model="application.business_address_1" type="text" class="form-control @error('application.business_address_1') is-invalid @enderror" placeholder="Address 1" />
                            @error('application.business_address_1')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Complex / Street / Address 2: (<span class="urdu-label" dir="rtl"> کمپلکس/ گلی/ بلاک/ سیکٹر </span>)<span class="text-danger">*</span></label>
                            <input wire:model="application.business_address_2" type="text" class="form-control @error('application.business_address_2') is-invalid @enderror" placeholder="Address 2" />
                            @error('application.business_address_2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>Area/ Locality / Address 3: (<span class="urdu-label" dir="rtl"> علاقہ/ سڑک/ گاؤں </span>)<span class="text-danger">*</span></label>
                            <input wire:model="application.business_address_3" type="text" class="form-control @error('application.business_address_3') is-invalid @enderror" placeholder="Address 3" />
                            @error('application.business_address_3')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label>Provinces: (<span class="urdu-label" dir="rtl"> صوبہ / ریاست </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown
                                    wire:model.defer="application.business_province_id"
                                    setFieldName="application.business_province_id"
                                    id="business_province_id"
                                    fieldName="province_name"
                                    :listing="$provinces" />
                            </div>
                            @error('application.business_province_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label>City: (<span class="urdu-label" dir="rtl"> شہر </span>)<span class="text-danger">*</span></label>
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
                            <label>District: (<span class="urdu-label" dir="rtl"> ضلع </span>)<span class="text-danger">*</span></label>
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
                            <label>Tehsil: (<span class="urdu-label" dir="rtl"> تحصیل </span>)<span class="text-danger">*</span></label>
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
                            <label>Capacity: (<span class="urdu-label" dir="rtl"> ملکیت کی قسم </span>)<span class="text-danger">*</span></label>
                            <div wire:ignore>
                                <x-select2-dropdown
                                    wire:model.defer="application.business_capacity_id"
                                    setFieldName="application.business_capacity_id"
                                    id="business_capacity_id"
                                    fieldName="capacity_name"
                                    :listing="$address_capacities" />
                            </div>
                            @error('application.business_capacity_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="form-group row">

                    <div class="col-lg-6">
                        <label>Share %: (<span class="urdu-label" dir="rtl"> حصہ فیصد </span>)<span class="text-danger">*</span></label>
                        <input wire:model.defer="application.business_share" type="number" min="0" max="100" class="form-control @error('application.business_share') is-invalid @enderror" placeholder="0-100" />
                        @error('application.business_share')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Acquisition Date: (<span class="urdu-label" dir="rtl"> حصول کی تاریخ </span>)<span class="text-danger">*</span></label>
                        <div wire:ignore>
                        <x-date-picker wire:model="application.business_acquisition_date"   id="business_acquisition_date"  />
                        </div>
                        @error('application.business_acquisition_date')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                    <div class="form-group row">
                        <div x-data="{ open: false }" class="col-lg-6">
                            <label>Evidence of tenancy/ ownership of business premises:<br>(<span class="urdu-label" dir="rtl"> کرایہ داری / کاروبار کے احاطے کی ملکیت کا ثبوت </span>)<span class="text-danger">*</span></label>

                            @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                                <br><a href="{{ asset('storage/'.$application['business_evidence_ownership_file']) }}" target="_blank" class="file_viewer" title="Evidence of tenancy/ ownership">View File</a>
                                &nbsp;|&nbsp;
                                <a @click="open = true" href="javascript:;" class="show_file" x-show="!open" onClick="return false;">Change File
                                </a><a href="javascript:;" onClick="return false;" x-show="open" @click="open = false">Do Not Change File</a>
                            @endif

                            <input @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file'])) x-show="open" @endif type="file" class="form-control" wire:model="business_evidence_ownership_file">
                            <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                            @error('business_evidence_ownership_file')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                    <div class="col-lg-6">
                        <label>Business Contact No. (<span class="urdu-label" dir="rtl"> کاروباری رابطہ نمبر </span>)<span class="text-danger">*</span></label>
                        <div wire:ignore>
                        <x-input-mask wire:model.defer="application.business_contact_number" class="business_contact_number" mask="9999-9999999" placeholder="Contact No." isInvalid="" />
                        </div>
                        @error('application.business_contact_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    </div>
                    <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Business Email Address: (<span class="urdu-label" dir="rtl"> کاروباری ای میل ایڈریس </span>)<span class="text-danger">*</span></label>
                        <input wire:model.defer="application.business_email" type="email" class="form-control @error('application.business_email') is-invalid @enderror" placeholder="Email Address" />
                        @error('application.business_email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    </div>


                </div>

                <!--end: Wizard Step 2-->
                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>UTILITY CONNECTIONS (<label class="urdu-label" dir="rtl"> یوٹیلیٹی کننیکشنز </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">

                        <div class="col-lg-12">
                            <label>Do you have utility connections? (<span class="urdu-label" dir="rtl"> کیا آپ کے پاس کوئی یوٹیلیٹی کننیکشنز ہے؟ </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($questions as $question)
                                    <label class="radio radio-success">
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

                        <div class="mt-10 section_add_more  @if(!$is_utility_connection) d-none @endif">
                            @if($index>0)
                            <div class="d-flex justify-content-end">
                                    <span wire:click.prevent="removeUtilityConnection({{ $index }})" wire:loading.attr="disabled"  class="btn btn-xs btn-icon px-4 py-4 btn-custom-color">
                            <i class="flaticon2-delete text-white"></i>
                            </span>
                            </div>
                            @endif

                        <div class="form-group row @if(!$is_utility_connection) d-none @endif">

                            <div class="col-lg-7">
                                <label>Utility Type: (<span class="urdu-label" dir="rtl"> یوٹیلیٹی کنکشن کی قسم </span>)<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($utility_types as $type)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="utility_connections.{{$index}}.utility_type_id" type="radio" name="utility_connections[{{$index}}][utility_type_id]" value="{{ $type->id }}">
                                            <span></span>{{ $type->type_name }}</label>
                                    @endforeach
                                </div>
                                @if($errors->has("utility_connections.$index.utility_type_id"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_type_id") }}</div>
                                @endif
                            </div>

                            <div class="col-lg-5">
                                <label>Connection Ownership: (<span class="urdu-label" dir="rtl"> کنکشن کی ملکیت </span>)<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($ownerships as $ownership)
                                        <label class="radio radio-success">
                                            <input wire:model="utility_connections.{{$index}}.connection_ownership_id" type="radio" name="utility_connections[{{$index}}][connection_ownership_id]" value="{{ $ownership->id }}">
                                            <span></span>{{ $ownership->ownership_name }}</label>
                                    @endforeach
                                </div>
                                @if($errors->has("utility_connections.$index.connection_ownership_id"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.connection_ownership_id") }}</div>
                                @endif
                            </div>



                        </div>
                        <div class="form-group row @if(!$is_utility_connection) d-none @endif">

                            <div class="col-lg-12">
                                <label>Form/Type of Connection: (<span class="urdu-label" dir="rtl"> کنکشن کی قسم </span>)<span class="text-danger">*</span></label>
                                <div class="radio-inline" wire:ignore>
                                    @foreach($utility_forms as $form)
                                        <label class="radio radio-success">
                                            <input wire:model.defer="utility_connections.{{$index}}.utility_form_id" type="radio" name="utility_connections[{{$index}}][utility_form_id]" value="{{ $form->id }}">
                                            <span></span>{{ $form->form_name }}</label>
                                    @endforeach
                                </div>
                                @if($errors->has("utility_connections.$index.utility_form_id"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_form_id") }}</div>
                                @endif
                            </div>


                        </div>
                        <div class="form-group row @if(!$is_utility_connection) d-none @endif">
                            <div class="col-lg-6">
                                <label>Reference/ Consumer Number: (<span class="urdu-label" dir="rtl"> حوالہ / صارف نمبر </span>)<span class="text-danger">*</span></label>
                                <input wire:model.defer="utility_connections.{{$index}}.utility_consumer_number" type="text" class="form-control @if($errors->has("utility_connections.$index.utility_consumer_number")) is-invalid @endif" placeholder="Consumer Number" />
                                @if($errors->has("utility_connections.$index.utility_consumer_number"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_consumer_number") }}</div>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <label>Provider: (<span class="urdu-label" dir="rtl"> سروس مہیا کرنے والا </span>)<span class="text-danger">*</span></label>
                                <input wire:model.defer="utility_connections.{{$index}}.utility_provider_other" type="text" class="form-control @if($errors->has("utility_connections.$index.utility_provider_other")) is-invalid @endif" placeholder="Provider" />
                                @if($errors->has("utility_connections.$index.utility_provider_other"))
                                    <div class="invalid-feedback d-block">{{ $errors->first("utility_connections.$index.utility_provider_other") }}</div>
                                @endif
                            </div>
                        </div>
                        </div>

                            @if(count($utility_connections)==($index+1))
                                <div class="d-flex justify-content-end @if(!$is_utility_connection) d-none-imp @endif">
                                    <div class="py-4">
                                        <button type="button" wire:click.prevent="addUtilityConnection" wire:loading.attr="disabled" class="btn btn-custom-color font-weight-bold px-4 py-2 d-block">Add More</button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!--end: Wizard Step 3-->

                <!--begin: Wizard Step 4-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white"><span>EMPLOYEES INFO  (<label class="urdu-label" dir="rtl"> ملازمین کی معلومات </label>)</span></h4>
                    <div class="section_box">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Do you have employees? (<span class="urdu-label" dir="rtl"> کیا آپ کے پاس ملازم ہیں؟ </span>)<span class="text-danger">*</span></label>
                            <div class="radio-inline" wire:ignore>
                                @foreach($questions as $question)
                                    <label class="radio radio-success">
                                        <input wire:model="application.employees_question_id" type="radio" name="employees_question_id" value="{{ $question->id }}">
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
                        <div  class="employee_info_div @if(!$is_employee_info) d-none @endif">

                        <div class="form-group row">
                            <div class="col-lg-12" wire:ignore>
                            <label class="checkbox checkbox-success">
                            <input  wire:model="employees.{{$index}}.employee_type_id"  type="checkbox" name="{{ $employee_type->type_name }}" value="{{ $employee_type->id }}">
                            <span></span>&nbsp;{{  $employee_type->type_name }} (<span class="urdu-label" dir="rtl"> {{ $employee_type->type_name_u }} </span>)</label>
                            </div>
                        </div>

                         <div class="form-group row @if(isset($employees[$index]['employee_type_id']) && $employees[$index]['employee_type_id']!=false) d-box @else d-none @endif">
                                @foreach($genders as $gender)
                                    <div class="col-lg-4">
                                        <label>{{ $gender->gender_name }} (<span class="urdu-label" dir="rtl"> {{ $gender->gender_name_u }} </span>)</label>
                                        <select wire:model="employees.{{$index}}.{{strtolower($gender->gender_name)}}"  class="form-control @error("employees.".$index.'.'.strtolower($gender->gender_name)) is-invalid @enderror">
                                            <option value="">Select Number</option>
                                            @for($no=0; $no<=$employee_numbers;$no++)
                                                <option value="{{ $no }}">{{ $no }}</option>
                                            @endfor
                                        </select>
                                        @error("employees.".$index.'.'.strtolower($gender->gender_name))
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                         </div>

                        </div>
                    @endforeach
                    </div>
                </div>
                <!--end: Wizard Step 4-->

                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                    <!--begin::Section-->
                    <h4 class="main_section_heading">APPLICANT PROFILE</h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BASIC INFO</span></h4>

                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">First Name: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['prefix_id'])?getCollectionTitle($prefixes,'prefix_name',$application['prefix_id']):'' }}&nbsp;{{ isset($application['first_name'])?$application['first_name']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Middle Name:</span>
                            <span class="opacity-70">{{ isset($application['middle_name'])?$application['middle_name']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Last Name: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['last_name'])?$application['last_name']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Gender: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['gender_id'])?getCollectionTitle($genders,'gender_name',$application['gender_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">CNIC No. <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['cnic_no'])?$application['cnic_no']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">CNIC Issue Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['cnic_issue_date'])?$application['cnic_issue_date']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">CNIC Expiry Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['cnic_expiry_date'])?$application['cnic_expiry_date']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Date of Birth: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['date_of_birth'])?$application['date_of_birth']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Designation in Business: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['designation_business_id'])?getCollectionTitle($designations,'name',$application['designation_business_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have Minority Status? <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['minority_status_question_id'])?getCollectionTitle($questions,'name',$application['minority_status_question_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root @if(!$is_minority_status) d-none-imp @endif">
                            <span class="font-weight-bolder mb-2">Minority Status: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['minority_status_id'])?getCollectionTitle($minority_status,'name',$application['minority_status_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root  @if(!$is_minority_status_other) d-none-imp @endif ">
                            <span class="font-weight-bolder mb-2">Other: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['minority_status_other'])?$application['minority_status_other']:'' }}</span>
                        </div>

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">National Tax Number (Personal): <span class="text-danger"></span></span>
                            <span class="opacity-70">{{ isset($application['ntn_personal'])?$application['ntn_personal']:'' }}</span>
                        </div>

                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>QUALIFICATION DETAILS</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Education Level: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['education_level_id'])?getCollectionTitle($education_level,'name',$application['education_level_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have any Technical Education? <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['technical_education_question_id'])?getCollectionTitle($questions,'name',$application['technical_education_question_id']):'' }}</span>
                        </div>
                    </div>
                    @foreach($technical_educations as $index=>$technical_education)
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Diploma/ Certificate Title: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($technical_education['certificate_title'])?$technical_education['certificate_title']:'' }}</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Are you a skilled worker or an artisan? <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['skilled_worker_question_id'])?getCollectionTitle($questions,'name',$application['skilled_worker_question_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root  @if(!$is_skilled_worker) d-none-imp @endif">
                            <span class="font-weight-bolder mb-2">Skill or Art: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['skill_or_art'])?$application['skill_or_art']:'' }}</span>
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RESIDENCE ADDRESS (LOCAL)</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Type of Property: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['residence_address_type_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Form of Property: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_address_form_id'])?getCollectionTitle($residence_address_forms,'form_name',$application['residence_address_form_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Unit / Address 1: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_address_1'])?$application['residence_address_1']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Complex / Street / Address 2: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_address_2'])?$application['residence_address_2']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Area/ Locality / Address 3: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_address_3'])?$application['residence_address_3']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">City: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_city_id'])?getCollectionTitle($cities,'city_name_e',$application['residence_city_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">District: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_district_id'])?getCollectionTitle($districts,'district_name_e',$application['residence_district_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Capacity: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['residence_capacity_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Share %: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_share'])?$application['residence_share']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Acquisition Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['residence_acquisition_date'])?$application['residence_acquisition_date']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Mobile No. <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['personal_mobile_no'])?$application['personal_mobile_no']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Email Address: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['personal_email'])?$application['personal_email']:'' }}</span>
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 main_section_heading">BUSINESS PROFILE</h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BASIC INFO</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Name: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_name'])?$application['business_name']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Acquisition/ Start/ Establishment/ Formation Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_establishment_date'])?$application['business_establishment_date']:'' }}</span>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Registration Status: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_registration_status_id'])?getCollectionTitle($business_registration_status,'name',$application['business_registration_status_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5 @if(!$is_business_registered) d-none-imp @endif">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Legal Status of Business: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_legal_status_id'])?getCollectionTitle($business_legal_statuses,'legal_name',$application['business_legal_status_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Registration Number: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_registration_number'])?$application['business_registration_number']:'' }}</span>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between pt-5 @if(!$is_business_registered) d-none-imp @endif">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Registration Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_registration_date'])?$application['business_registration_date']:'' }}</span>
                        </div>

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business NTN: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_ntn_no'])?$application['business_ntn_no']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Category: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'section_name',$application['business_activity_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Sector: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'group_name',$application['business_activity_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Sub Sector: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_activity_id'])?getCollectionTitle($business_activities,'class_name',$application['business_activity_id']):'' }}</span>
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>RELEVANT ATTACHMENTS</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        @if(isset($application['proof_of_ownership_file']) && !empty($application['proof_of_ownership_file']))
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Upload Proof of Ownership: <span class="text-danger">*</span></span>
                            <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['proof_of_ownership_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                        </div>
                        @endif

                            @if(isset($application['license_registration_file']) && !empty($application['license_registration_file']))
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">License /Registration with chamber or Trade body:</span>
                                    <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['license_registration_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                                </div>
                            @endif

                    </div>
                    <div class="d-flex justify-content-between pt-5 @if(!$is_business_registered) d-none-imp @endif ">
                        @if(isset($application['registration_certificate_file']) && !empty($application['registration_certificate_file']))
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Upload Registration Certificate: <span class="text-danger">*</span></span>
                                <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['registration_certificate_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                            </div>
                        @endif

                    </div>
                    </div>

                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>BUSINESS ADDRESS</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Type of Property: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_address_type_id'])?getCollectionTitle($address_types,'type_name',$application['business_address_type_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Form of Property: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_address_form_id'])?getCollectionTitle($business_address_forms,'form_name',$application['business_address_form_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Unit / Address 1: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_address_1'])?$application['business_address_1']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Complex / Street / Address 2: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_address_2'])?$application['business_address_2']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Area/ Locality / Address 3: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_address_3'])?$application['business_address_3']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Provinces: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_province_id'])?getCollectionTitle($provinces,'province_name',$application['business_province_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">City: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_city_id'])?getCollectionTitle($business_cities,'city_name_e',$application['business_city_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">District: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_district_id'])?getCollectionTitle($business_districts,'district_name_e',$application['business_district_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Tehsil: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_tehsil_id'])?getCollectionTitle($business_tehsils,'tehsil_name_e',$application['business_tehsil_id']):'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Capacity: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_capacity_id'])?getCollectionTitle($address_capacities,'capacity_name',$application['business_capacity_id']):'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Share %: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_share'])?$application['business_share']:'' }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Acquisition Date: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_acquisition_date'])?$application['business_acquisition_date']:'' }}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        @if(isset($application['business_evidence_ownership_file']) && !empty($application['business_evidence_ownership_file']))
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Evidence of tenancy/ ownership of business premises: <span class="text-danger">*</span></span>
                                <span class="opacity-70">
                                <a href="{{ \Illuminate\Support\Facades\Storage::url($application['business_evidence_ownership_file']) }}" target="_blank" class="hand">Download&nbsp;<i class="flaticon2-download"></i></a>
                            </span>
                            </div>
                        @endif
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Business Contact No. <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($application['business_contact_number'])?$application['business_contact_number']:'' }}</span>
                            </div>
                    </div>
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Business Email Address: <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['business_email'])?$application['business_email']:'' }}</span>
                        </div>
                    </div>
                    </div>

                    <h4 class="mt-10 main_section_heading">UTILITY CONNECTIONS</h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>UTILITY CONNECTIONS DETAIL</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have utility connections? <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['utility_connection_question_id'])?getCollectionTitle($questions,'name',$application['utility_connection_question_id']):'' }}</span>
                        </div>
                    </div>

                @foreach($utility_connections as $index=>$connection)
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Connection Ownership: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($connection['connection_ownership_id'])?getCollectionTitle($ownerships,'ownership_name',$connection['connection_ownership_id']):'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Utility Type: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($connection['utility_type_id'])?getCollectionTitle($utility_types,'type_name',$connection['utility_type_id']):'' }}</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Reference/ Consumer Number: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($connection['utility_consumer_number'])?$connection['utility_consumer_number']:'' }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Form/Type of Connection: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($connection['utility_form_id'])?getCollectionTitle($utility_forms,'form_name',$connection['utility_form_id']):'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-5">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Provider: <span class="text-danger">*</span></span>
                                <span class="opacity-70">{{ isset($connection['utility_provider_other'])?$connection['utility_provider_other']:'' }}</span>
                            </div>
                        </div>
                @endforeach
                    </div>

                    <h4 class="mt-10 main_section_heading">EMPLOYEES INFO</h4>
                    <h4 class="mt-10 font-weight-bold section_heading text-white"><span>EMPLOYEES INFO DETAIL</span></h4>
                    <div class="section_box">
                    <div class="d-flex justify-content-between pt-5">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Do you have employees? <span class="text-danger">*</span></span>
                            <span class="opacity-70">{{ isset($application['employees_question_id'])?getCollectionTitle($questions,'name',$application['employees_question_id']):'' }}</span>
                        </div>
                    </div>

                    @if($is_employee_info)
                    @foreach($employees as $employee)
                        <h6 class="mb-4 mt-5 font-weight-bold text-dark">{{ isset($employee['employee_type_id'])?getCollectionTitle($employee_types,'type_name',$employee['employee_type_id']):'' }}</h6>
                        <div class="d-flex justify-content-between pt-5">
                            @foreach($genders as $gender)
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">{{ $gender->gender_name }}</span>
                                <span class="opacity-70">{{ isset($employee[strtolower($gender->gender_name)])?$employee[strtolower($gender->gender_name)]:'' }}</span>
                            </div>
                            @endforeach
                        </div>
                     @endforeach
                    @endif
                    </div>

                    <!--end::Section-->
                </div>
                <!--end: Wizard Step 3-->

                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        @if($step> 0 && $step<=4)
                        <button type="button" class="btn btn-custom-dark font-weight-bold px-8 py-2 d-block" data-wizard-type="action-prev" wire:click.prevent="decreaseStep"  wire:loading.attr="disabled">Previous</button>
                        @endif
                    </div>
                    <div>
                        @if($step >= 4)
                        <button type="button" class="btn btn-custom-color font-weight-bold px-8 py-2 d-block" data-wizard-type="action-submit" wire:loading.attr="disabled" wire:click.prevent="submitApplication">Submit</button>
                        @else
                        <button type="button" class="btn btn-custom-color font-weight-bold px-8 py-2 d-block" data-wizard-type="action-next" wire:loading.attr="disabled" wire:click.prevent="submitApplication"  >Save & Next</button>
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

