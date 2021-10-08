<div x-data="{
    inspection_required: '{{ $form['inspection_required']??null }}',
    automation_status: '{{ $form['automation_status']??null }}',
    fee_submission_mode: '{{ $form['fee_submission_mode']??null }}',
    renewal_required: '{{ $form['renewal_required']??null }}',
    dependency_question: '{{ $form['dependency_question']??null }}',
    generic_sector: '{{ $form['generic_sector']??null }}',
    fee_question: '{{ $form['fee_question']??null }}',
    fee_plan: '{{ $form['fee_plan']??null }}',
    renewal_fee_plan: '{{ $form['renewal_fee_plan']??null }}',
    time_unit: '{{ $form['time_unit']??null }}',
    fee_manual_mode: '{{ $form['fee_manual_mode']??null }}',
}" class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps  py-0 px-9 py-lg-0 px-lg-9">

            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step', 1)" wire:loading.attr="disabled"   class="wizard-label">
                    <h3 class="wizard-title">{!! __('Basic Info') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->


            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step', 2)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Process') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div x-show.transition.opacity="automation_status!='No Information'" class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',3)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Dependencies') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 4 Nav-->
            <div x-show.transition.opacity="automation_status!='No Information'" class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',4)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Inspections') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 4 Nav-->


            <!--begin::Wizard Step 5 Nav-->
            <div x-show.transition.opacity="automation_status!='No Information'" class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',5)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('FAQs') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

            <!--begin::Wizard Step 6 Nav-->
            <div x-show.transition.opacity="automation_status!='No Information'" class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==6){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',6)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __("Observations") !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 6 Nav-->

            <!--begin::Wizard Step 6 Nav-->
            <div x-show.transition.opacity="automation_status!='No Information'" class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==7){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',7)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __("Other Documents") !!}</h3>
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
                     data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('BASIC INFO') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('Department Name') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="form.department_id"
                                                        setFieldName="form.department_id"
                                                        id="department_id" fieldName="department_name"
                                                        :listing="$departments"/>
                                </div>
                                @error('form.department_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('RLCOs Name') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.rlco_name" type="text"
                                       class="form-control @error('form.rlco_name') is-invalid @enderror"
                                       placeholder="RLCOs Name"/>
                                @error('form.rlco_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Purpose/Short Description') !!}<span class="text-danger"></span></label>
                                <textarea wire:model.defer="form.purpose"  class="form-control" ></textarea>
                                @error('form.purpose')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Description') !!}<span class="text-danger"></span></label>
                                <div wire:ignore>
                                    <x-c-k-editor wire:model.debounce.999999s="form.description" id="description-ckeditor" placeholder="Description" setFieldName="form.description" ></x-c-k-editor>
                                </div>
                                @error('form.description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-lg-6">
                                <label for="">Scope</label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope" value="Federal">
                                        <span></span>Federal</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope"  value="Provincial">
                                        <span></span>Provincial</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope" value="District">
                                        <span></span>District</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope" value="Tehsil">
                                        <span></span>Tehsil</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope" value="UC">
                                        <span></span>UC</label>
                                </div>
                                @error('form.scope')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->


                            <div class="col-lg-6">
                                <label>{!! __('Business Category/ Section') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="form.business_category_id"
                                                        setFieldName="form.business_category_id"
                                                        id="business_category_id" fieldName="category_name"
                                                        :listing="$business_categories"/>
                                </div>
                                @error('form.business_category_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="">What type of business is this applicable for? <span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.generic_sector" name="generic_sector" @click="generic_sector= 'Specific'"  value="Specific">
                                        <span></span>Specific</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.generic_sector" name="generic_sector" @click="generic_sector= 'Generic for all'" value="Generic for all">
                                        <span></span>Generic for all</label>
                                </div>
                                @error('form.dependency_question')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div  x-show.transition.opacity="generic_sector=='Specific'" class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Sectors') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-multi-column-checkbox-select2 :listing="$business_activities"
                                                            wire:model.defer="form.business_activity_ids"
                                                            setFieldName="form.business_activity_ids"
                                                            id="business_activity_ids" fieldName="class_name"/>
                                </div>
                                @error('form.business_activity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Activities') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="form.activity_ids"
                                                        isMultiple="true"
                                                        setFieldName="form.activity_ids"
                                                        id="activity_ids" fieldName="activity_name"
                                                        :listing="$activities"/>
                                </div>
                                @error('form.activity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-lg-6">
                                <label>{!! __('Title of Law') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.title_of_law" type="text"
                                       class="form-control @error('form.title_of_law') is-invalid @enderror"
                                       placeholder=""/>
                                @error('form.title_of_law')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Link of Law') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.link_of_law" type="text"
                                       class="form-control @error('form.link_of_law') is-invalid @enderror"
                                       placeholder=""/>
                                @error('form.link_of_law')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="">Automation Status<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model="form.automation_status" name="automation_status" @click="automation_status= 'Fully Automated'"  value="Fully Automated">
                                        <span></span>Fully Automated</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model="form.automation_status" name="automation_status" @click="automation_status= 'Semi Automated'" value="Semi Automated">
                                        <span></span>Semi Automated</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model="form.automation_status" name="automation_status" @click="automation_status= 'Manual'" value="Manual">
                                        <span></span>Manual</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model="form.automation_status" name="automation_status" @click="automation_status= 'No Information'" value="No Information">
                                        <span></span>No Information</label>
                                </div>
                                @error('form.automation_status')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                        </div>

                        </div>

                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('META DATA') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Keywords') !!} <span class="text-dark-50">(Enter comma separated keywords)</span><span class="text-danger"></span></label>
                                <div wire:ignore >
                                <x-select2-tag wire:model.defer="form.keyword_ids"
                                                    isMultiple="true"
                                                    setFieldName="form.keyword_ids"
                                                    id="keyword_ids" fieldName="keyword_name"
                                                    :listing="$keywords"/>
                                </div>

                                @error('form.keywords')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>Last Verified Date<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-date-picker wire:model.defer="form.last_updated_date" id="last_updated_date"/>
                                </div>
                                @error('application.last_updated_date')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>


                <!--end: Section Box-->
                </div>
                <!--end: Wizard Step 1-->



                <!--begin: Wizard Step 2-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('PROCESS') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div x-show.transition.opacity="automation_status=='No Information'" class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Contact Detail / Department office address Detail') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                <x-c-k-editor wire:model.debounce.999999s="form.manual_detail" id="manual_detail-ckeditor" placeholder="Contact Detail / Department office address Detail" setFieldName="form.manual_detail" ></x-c-k-editor>
                                </div>
                                @error('form.manual_detail')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information'" class="row form-group">

                            <div class="col-lg-6">
                                <label>Fee Required<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_question" name="fee_question" @click="fee_question= 'Yes'"  value="Yes">
                                        <span></span>Yes</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_question" name="fee_question" @click="fee_question= 'No'" value="No">
                                        <span></span>No</label>
                                </div>
                                @error('form.payment_source')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && fee_question=='Yes'" class="row form-group">

                            <div class="col-lg-6">
                                <label>Fee Plan<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_plan" name="fee_plan" @click="fee_plan= 'Single Fee'"  value="Single Fee">
                                        <span></span>Single Fee</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_plan" name="fee_plan" @click="fee_plan= 'Schedule'" value="Schedule">
                                        <span></span>Schedule</label>
                                </div>
                                @error('form.payment_source')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && fee_question=='Yes'" class="row form-group">

                            <div class="col-lg-6" x-show.transition.opacity="fee_plan=='Single Fee'" >
                                <label>{!! __('Fee') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.fee" type="number"
                                       class="form-control @error('form.fee') is-invalid @enderror"
                                       placeholder="Fee"/>
                                @error('form.fee')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>Fee Submission Mode<span class="text-danger"></span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_submission_mode" name="fee_submission_mode" @click="fee_submission_mode= 'Online'" value="Online">
                                        <span></span>Online</label>
                                    <label  class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_submission_mode" name="fee_submission_mode" @click="fee_submission_mode= 'Manual'" value="Manual">
                                        <span></span>Manual</label>
                                </div>
                                @error('form.fee_submission_mode')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->


                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && fee_question=='Yes' && fee_submission_mode=='Manual'" class="row form-group">

                            <div class="col-lg-6">
                                <label>Way of Payment<span class="text-danger"></span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_manual_mode" name="fee_manual_mode" @click="fee_manual_mode= 'OTC'" value="OTC">
                                        <span></span>OTC</label>
                                    <label  class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.fee_manual_mode" name="fee_manual_mode" @click="fee_manual_mode= 'By Hand'" value="By Hand">
                                        <span></span>By Hand</label>
                                </div>
                                @error('form.fee_manual_mode')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                        </div>


                        <div x-show.transition.opacity="automation_status!='No Information' && fee_question=='Yes'" class="row form-group">

                            <div x-show.transition.opacity="fee_submission_mode=='Online'" class="col-lg-6">
                                <label>Way of Payment<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.payment_source" name="payment_source"  value="ePay Punjab">
                                        <span></span>ePay Punjab</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.payment_source" name="payment_source" value="Banks">
                                        <span></span>Banks</label>
                                </div>
                                @error('form.payment_source')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                            <div x-show.transition.opacity="fee_submission_mode=='Manual' && fee_manual_mode=='OTC'"  class="col-lg-6">
                                <div x-data="{ open: false }">
                                    <label>{!!__('Challan form') !!}<span class="text-danger">*</span></label>
                                    @if(isset($form['challan_form_file']) && !empty($form['challan_form_file']))
                                        <br><a href="{{ asset('storage/'.$form['challan_form_file']) }}"
                                               target="_blank" class="file_viewer" title="Challan form">View File</a>
                                        &nbsp;|&nbsp;
                                        <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                        <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('challan_form_file', null)">Do Not Change File</a>
                                    @endif

                                    <input
                                        @if(isset($form['challan_form_file']) && !empty($form['challan_form_file'])) x-show="open"
                                        @endif  type="file" class="form-control" wire:model="challan_form_file">
                                    <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                    @error('challan_form_file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && fee_question=='Yes' && fee_plan=='Schedule'" class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Fee Schedule') !!}<span class="text-danger"></span></label>
                                <div wire:ignore>
                                    <x-c-k-editor wire:model.debounce.999999s="form.fee_schedule" id="fee_schedule-ckeditor" placeholder="Fee Schedule" setFieldName="form.fee_schedule" ></x-c-k-editor>
                                </div>
                                @error('form.fee_schedule')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div x-show.transition.opacity="automation_status!='No Information'" class="row form-group">
                            <div class="col-lg-6">
                                <label for="">Renewal Required<span class="text-danger">*</span></label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.renewal_required" name="renewal_required" @click="renewal_required= 'Yes'"  value="Yes">
                                        <span></span>Yes</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.renewal_required" name="renewal_required" @click="renewal_required= 'No'" value="No">
                                        <span></span>No</label>
                                </div>
                                @error('form.renewal_required')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->
                        </div>



                        <div x-show.transition.opacity="automation_status!='No Information' && renewal_required=='Yes'" class="row form-group">

                            <div class="col-lg-6">
                                <label>{!! __('Validity') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.validity" type="text"
                                       class="form-control @error('form.validity') is-invalid @enderror"
                                       placeholder="Validity"/>
                                @error('form.validity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                                <div class="col-lg-6">
                                    <label>Renewal Fee Plan<span class="text-danger">*</span></label>
                                    <div class="radio-inline">
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.renewal_fee_plan" name="renewal_fee_plan" @click="renewal_fee_plan= 'Single Fee'"  value="Single Fee">
                                            <span></span>Single Fee</label>
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.renewal_fee_plan" name="renewal_fee_plan" @click="renewal_fee_plan= 'Schedule'" value="Schedule">
                                            <span></span>Schedule</label>
                                    </div>
                                    @error('form.payment_source')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><!--form-group ends-->

                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && renewal_required=='Yes' && renewal_fee_plan=='Single Fee'" class="row form-group">
                        <div class="col-lg-6">
                            <label>{!! __('Renewal Fee') !!}<span class="text-danger"></span></label>
                            <input wire:model.defer="form.renewal_fee" type="number"
                                   class="form-control @error('form.renewal_fee') is-invalid @enderror"
                                   placeholder="Renewal Fee"/>
                            @error('form.renewal_fee')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information' && renewal_required=='Yes' && renewal_fee_plan=='Schedule'" class="row form-group">
                            <div class="col-lg-12">
                                <label>{!! __('Renewal Fee Schedule') !!}<span class="text-danger"></span></label>
                                <div wire:ignore>
                                    <x-c-k-editor wire:model.debounce.999999s="form.renewal_fee_schedule" id="renewal_fee_schedule-ckeditor" placeholder="Renewal Fee Schedule" setFieldName="form.renewal_fee_schedule" ></x-c-k-editor>
                                </div>
                                @error('form.renewal_fee_schedule')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div x-show.transition.opacity="automation_status!='No Information'"  class="row form-group">

                            <div class="col-lg-6">
                                <label>{!! __('Processing Time') !!}&nbsp;&nbsp;
                                    <div class="radio-inline float-right">
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.time_unit" name="time_unit" @click="time_unit= 'Instantly'"  value="Instantly">
                                            <span></span>Instantly</label>
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.time_unit" name="time_unit" @click="time_unit= 'Minute (s)'" value="Minute (s)">
                                            <span></span>Minutes</label>
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.time_unit" name="time_unit" @click="time_unit= 'Hour (s)'" value="Hour (s)">
                                            <span></span>Hours</label>
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.time_unit" name="time_unit" @click="time_unit= 'Day (s)'" value="Day (s)">
                                            <span></span>Days</label>
                                        <label class="radio radio-success">
                                            <input type="radio" wire:model.defer="form.time_unit" name="time_unit" @click="time_unit= 'Month (s)'" value="Month (s)">
                                            <span></span>Months</label>
                                    </div>
                                </label>
                                <input  x-show.transition.opacity="time_unit!='Instantly'" wire:model.defer="form.time_taken" type="text"
                                       class="form-control @error('form.time_taken') is-invalid @enderror"
                                       placeholder="Time Taken"/>
                                @error('form.time_taken')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Process Flow Diagram') !!}<span class="text-danger"></span></label>
                                @if(isset($form['process_flow_diagram_file']) && !empty($form['process_flow_diagram_file']))
                                    <br><a href="{{ asset('storage/'.$form['process_flow_diagram_file']) }}"
                                           target="_blank" class="file_viewer" title="Process Flow Diagram">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('process_flow_diagram_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['process_flow_diagram_file']) && !empty($form['process_flow_diagram_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="process_flow_diagram_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('process_flow_diagram_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information'">
                        @include('livewire.required-document-form')
                        </div>

                        <div x-show.transition.opacity="automation_status!='No Information'" class="row form-group">

                            <div class="col-lg-6 d-none">
                                <label>{!! __('Automated System Link') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.automated_system_link" type="text"
                                       class="form-control @error('form.automated_system_link') is-invalid @enderror"
                                       placeholder="Automated System Link"/>
                                @error('form.automated_system_link')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div x-show.transition.opacity="automation_status=='Semi Automated'" class="col-lg-6" >
                            <div x-data="{ open: false }" >
                                    <label>{!!__('Application Form') !!}<span class="text-danger"></span></label>
                                    @if(isset($form['application_form_file']) && !empty($form['application_form_file']))
                                        <br><a href="{{ asset('storage/'.$form['application_form_file']) }}"
                                               target="_blank" class="file_viewer" title="Application Form">View File</a>
                                        &nbsp;|&nbsp;
                                        <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                        <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('application_form_file', null)">Do Not Change File</a>
                                    @endif

                                    <input
                                        @if(isset($form['application_form_file']) && !empty($form['application_form_file'])) x-show="open"
                                        @endif  type="file" class="form-control" wire:model="application_form_file">
                                    <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                    @error('application_form_file')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div  x-show.transition.opacity="automation_status!='No Information'"  class="col-lg-6">
                                <label>{!! __('System/ Application URL') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.application_url" type="text"
                                       class="form-control @error('form.application_url') is-invalid @enderror"
                                       placeholder="System/ Application URL"/>
                                @error('form.application_url')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div  class="col-lg-6">
                                <label>{!! __('Department Website') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.department_website" type="text"
                                       class="form-control @error('form.department_website') is-invalid @enderror"
                                       placeholder="Department Website"/>
                                @error('form.department_website')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>



                    </div>
                </div>
                <!--end: Wizard Step 2-->

                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('Dependencies') !!}</span>
                    </h4>

                    <div class="section_box">

                        <div class="row form-group">
                        <div class="col-lg-12">
                            <label for="">Is there involvement of any other organization as a prerequisite to this RLCO?<span class="text-danger">*</span></label>
                            <div class="radio-inline">
                                <label class="radio radio-success">
                                    <input type="radio" wire:model.defer="form.dependency_question" name="dependency_question" @click="dependency_question= 'Yes'"  value="Yes">
                                    <span></span>Yes</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model.defer="form.dependency_question" name="dependency_question" @click="dependency_question= 'No'" value="No">
                                    <span></span>No</label>
                            </div>
                            @error('form.dependency_question')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div><!--form-group ends-->
                    </div>
                   <div  x-show.transition.opacity="dependency_question=='Yes'">
                    @include('livewire.dependency-form')
                   </div>

                    </div>
                </div>
                <!--end: Wizard Step 3-->

                <!--begin: Wizard Step 4-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('INSPECTIONS') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-12">
                            <label class="control-label">What type of inspections are required? <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="radio-list">
                                <label class="radio radio-success">
                                    <input @click="inspection_required= 'Manual'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Manual">
                                    <span></span>Pre-inspection</label>
                                <label class="radio radio-success">
                                    <input @click="inspection_required= 'Post-inspection'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Post-inspection">
                                    <span></span>Post-inspection</label>
                                <label class="radio radio-success">
                                    <input @click="inspection_required= 'Both'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Both">
                                    <span></span>Both</label>
                                <label class="radio radio-success">
                                    <input @click="inspection_required= 'None'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="None">
                                    <span></span>None</label>
                            </div>
                        </div>

                        <div x-show.transition.opacity="inspection_required && inspection_required!='None'" >


                        <div class="row form-group">
                            <div class="col-lg-12">
                            <label class="control-label">Mode of Inspection <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="radio-list">
                                <label class="radio radio-success">
                                    <input type="radio"  wire:model.defer="form.mode_of_inspection" name="mode_of_inspection" value="Manual (Physical visit with manual data entry)">
                                    <span></span>Manual (Physical visit with manual data entry)</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model.defer="form.mode_of_inspection" name="mode_of_inspection" value="Semi Automated (Physical visit with data entry using Mobile App/System)">
                                    <span></span>Semi Automated (Physical visit with data entry using Mobile App/System)</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model.defer="form.mode_of_inspection" name="mode_of_inspection" value="Fully Automated (No physical visit)">
                                    <span></span>Fully Automated (No physical visit)</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                    <label>{!! __('Joint inspection with (if applicable)') !!}<span class="text-danger"></span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="form.inspection_department_id"
                                                        setFieldName="form.inspection_department_id"
                                                        id="inspection_department_id" fieldName="department_name"
                                                        :listing="$departments"/>
                                </div>
                                    @error('form.joint_inspection_department_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                             </div>

                        </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>{!! __('Fine Details (if any)') !!}<span class="text-danger"></span></label>
                                    <div wire:ignore>
                                        <x-c-k-editor wire:model.debounce.999999s="form.fine_details" id="fine_details-ckeditor" placeholder="Fine Details" setFieldName="form.fine_details" ></x-c-k-editor>
                                    </div>
                                    @error('form.fine_details')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--end: Wizard Step 4-->


                <!--begin: Wizard Step 5-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('FAQs') !!}</span>
                    </h4>
                    @include('livewire.faq-form')
                </div>
                <!--end: Wizard Step 5-->

                <!--begin: Wizard Step 6-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==6){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('OBSERVATION') !!}</span>
                    </h4>
                    @includeWhen($step==6, 'livewire.fos-form')
                </div>
                <!--end: Wizard Step 6-->

                <!--begin: Wizard Step 6-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==7){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('Other Document') !!}</span>
                    </h4>
                    @includeWhen($step==7, 'livewire.other-document-form')
                </div>
                <!--end: Wizard Step 6-->


                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        @if($step> 1 && $step<=7)
                            <button type="button"
                                    class="btn btn-custom-dark font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-prev"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:click.prevent="decreaseStep"
                                    wire:loading.attr="disabled">{!! __('Back') !!}
                            </button>
                        @endif
                    </div>

                    @if($step >= 7 || (isset($form['automation_status']) && $form['automation_status']=='No Information' && $step==2))
                        <div>
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block float-left mr-10"
                                    data-wizard-type="action-next"
                                    id="saved"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="submitForm"
                            >{!! __('Save') !!}
                            </button>

                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-submit"
                                    id="submitted"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="finalSubmitForm">{!! __('Submit') !!}
                            </button>
                        </div>
                    @else
                        <div>
                                <button type="button"
                                        class="btn btn-custom-color font-weight-bold px-8 py-2 d-block float-left mr-10"
                                        data-wizard-type="action-next"
                                        id="saved"
                                        wire:loading.class="spinner spinner-white spinner-right"
                                        wire:loading.attr="disabled"
                                        wire:click.prevent="submitForm"
                                >{!! __('Save') !!}
                                </button>
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-next"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="increaseStep"
                            >{!! __('Next') !!}
                            </button>
                        </div>
                    @endif
                </div>
                <!--end: Wizard Actions-->
            </form>
            <!--end: Wizard Form-->
        </div>
    </div>
        <!--end: Wizard Body-->

</div>

@push('post-scripts')
<script>

window.addEventListener('child:multi-column-checkbox-select2', event =>{
let child_id = event.detail.child_id;
$(child_id).empty();
var newOption = new Option("--- Please Select ---", "", false, false);
$(child_id).append(newOption);
event.detail.data.forEach(function(row){
$(child_id).append('<option data-json=\''+JSON.stringify(row)+'\' value="'+row.id+'">'+row[event.detail.field_name]+'</option>');
});
$(child_id).trigger('change.select2');
});

</script>

@endpush
