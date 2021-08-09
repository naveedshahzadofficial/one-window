<div  class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
    <!--begin: Wizard Nav-->
    <div class="wizard-nav">
        <div class="wizard-steps  py-0 px-9 py-lg-0 px-lg-9">

            <!--begin::Wizard Step 1 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step', 0)" wire:loading.attr="disabled"   class="wizard-label">
                    <h3 class="wizard-title">{!! __('Basic Info') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 1 Nav-->
            <!--begin::Wizard Step 2 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step', 1)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Process') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',2)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Inspections') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 4 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',3)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Automation') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 4 Nav-->

            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',4)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Review') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',5)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Submission') !!}</h3>
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
            <form class="form">

                <!--begin: Wizard Step 1-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==0){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('BASIC INFO') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div class="form-group row">
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

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!! __('Description') !!}<span class="text-danger">*</span></label>
                                <textarea wire:model.defer="form.description" type="text"
                                       class="form-control @error('form.description') is-invalid @enderror"
                                          placeholder="Description"></textarea>
                                @error('form.description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('Department Name') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.department_id" type="text"
                                       class="form-control @error('form.department_id') is-invalid @enderror"
                                       placeholder="Department Name"/>
                                @error('form.department_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Business Category') !!}<span
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

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label>{!! __('Sector') !!}<span class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-multi-column-select2 :listing="$business_activities"
                                                            wire:model.defer="form.business_activity_id"
                                                            setFieldName="form.business_activity_id"
                                                            id="business_activity_id" fieldName="class_name"/>
                                </div>
                                @error('form.business_activity_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('Fee') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.fee" type="text"
                                       class="form-control @error('form.fee') is-invalid @enderror"
                                       placeholder="Fee"/>
                                @error('form.fee')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Validity') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.validity" type="text"
                                       class="form-control @error('form.validity') is-invalid @enderror"
                                       placeholder="Validity"/>
                                @error('form.validity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('Challan form') !!}<span class="text-danger">*</span></label>
                                <input  type="file" class="form-control" wire:model="form.challan_form">
                                @error('form.challan_form')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Time Taken') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.time_taken" type="text"
                                       class="form-control @error('form.time_taken') is-invalid @enderror"
                                       placeholder="Time Taken"/>
                                @error('form.time_taken')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label>{!! __('Relevant Notification/Order') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.relevant_order" type="text"
                                       class="form-control @error('form.relevant_order') is-invalid @enderror"
                                       placeholder="Relevant Notification"/>
                                @error('form.relevant_order')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Process Flow Diagram') !!}<span class="text-danger">*</span></label>
                                <input  type="file" class="form-control" wire:model="form.process_flow_diagram">
                                @error('form.process_flow_diagram')
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
                     data-wizard-state="@if($step==1){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('FULLY AUTOMATED') !!}</span>
                    </h4>
                    <div class="section_box">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>{!! __('Links') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.links" type="text"
                                       class="form-control @error('form.links') is-invalid @enderror"
                                       placeholder="Links"/>
                                @error('form.links')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                    </div>
                </div>
                <!--end: Wizard Step 2-->


                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        @if($step> 0 && $step<=5)
                            <button type="button"
                                    class="btn btn-custom-dark font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-prev"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:click.prevent="decreaseStep"
                                    wire:loading.attr="disabled">{!! __('Back') !!}
                            </button>
                        @endif
                    </div>

                    @if($step >= 5)
                        <div>
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-submit"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="submitApplication">{!! __('Submit') !!}
                            </button>
                        </div>
                    @else
                        <div>
                            @if($step!=4)
                                <button type="button"
                                        class="btn btn-custom-color font-weight-bold px-8 py-2 d-block float-left mr-10"
                                        data-wizard-type="action-next"
                                        wire:loading.class="spinner spinner-white spinner-right"
                                        wire:loading.attr="disabled"
                                        wire:click.prevent="submitForm"
                                >{!! __('Save') !!}
                                </button>
                            @endif
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
