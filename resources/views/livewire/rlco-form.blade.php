<div x-data="{
    is_inspection: '{{ $is_inspection ? 'Other' : 'None' }}',
}" class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
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
                    <h3 class="wizard-title">{!! __('Dependencies') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',3)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Inspections') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 4 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',4)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('Automation') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 4 Nav-->

            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',5)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __('FAQs') !!}</h3>
                </div>
            </div>
            <!--end::Wizard Step 5 Nav-->

            <!--begin::Wizard Step 5 Nav-->
            <div class="wizard-step" data-wizard-type="step"
                 data-wizard-state="@if($step==6){{ 'current' }}@else{{ 'done' }}@endif">
                <div wire:click.prevent="$set('step',6)" wire:loading.attr="disabled"  class="wizard-label">
                    <h3 class="wizard-title">{!! __("FOS") !!}</h3>
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

                        <div class="row form-group">
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
                                <label>{!! __('Description') !!}<span class="text-danger">*</span></label>
                                <textarea wire:model.defer="form.description" type="text"
                                       class="form-control @error('form.description') is-invalid @enderror"
                                          placeholder="Description"></textarea>
                                @error('form.description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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

                        <div class="row form-group">
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

                        <div class="row form-group">
                            <div class="col-lg-6">
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

                            <div class="col-lg-6">

                                <label for="">Scope</label>
                                <div class="radio-inline">
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope"  value="Provincial">
                                        <span></span>Provincial</label>
                                    <label class="radio radio-success">
                                        <input type="radio" wire:model.defer="form.scope" name="scope" value="Federal">
                                        <span></span>Federal</label>
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
                                @error('activity_status')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div><!--form-group ends-->

                        </div>

                        <div class="row form-group">

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

                        <div class="row form-group">
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


                        </div>

                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('META DATA') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('Keywords') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.keywords" type="text"
                                       class="form-control @error('form.keywords') is-invalid @enderror"
                                       placeholder="Keywords"/>
                                @error('form.keywords')
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
                        <span>  {!! __('PROCESS') !!}</span>
                    </h4>
                    <div class="section_box">


                        <div class="row form-group">

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Relevant Notification/Order') !!}<span class="text-danger">*</span></label>
                                @if(isset($form['relevant_order_file']) && !empty($form['relevant_order_file']))
                                    <br><a href="{{ asset('storage/'.$form['relevant_order_file']) }}"
                                           target="_blank" class="file_viewer" title="Relevant Notification/Order">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('relevant_order_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['relevant_order_file']) && !empty($form['relevant_order_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="relevant_order_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('relevant_order_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Process Flow Diagram') !!}<span class="text-danger">*</span></label>
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


                        <div class="row form-group">
                            <div x-data="{ open: false }" class="col-lg-6">
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
                            <div x-data="{ open: false }" class="col-lg-6">
                                    <label>{!!__('Application Form') !!}<span class="text-danger">*</span></label>
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

                        <div class="row form-group">

                            <div class="col-lg-6">
                                <label>{!! __('Required Documents') !!}<span
                                        class="text-danger">*</span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="form.required_document_ids"
                                                        isMultiple="true"
                                                        setFieldName="form.required_document_ids"
                                                        id="required_document_ids" fieldName="document_title"
                                                        :listing="$required_documents"/>
                                </div>
                                @error('form.required_documents')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>



                    </div>
                </div>
                <!--end: Wizard Step 2-->

                <!--begin: Wizard Step 3-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==2){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('Dependencies') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('Organization') !!}<span class="text-danger"></span></label>
                                <div wire:ignore>
                                    <x-select2-dropdown wire:model.defer="dependency_form.department_id"
                                                        setFieldName="dependency_form.department_id"
                                                        id="organization_id" fieldName="department_name"
                                                        :listing="$departments"/>
                                </div>
                                @error('dependency_form.department_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Activity Name') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="dependency_form.activity_name" type="text"
                                       class="form-control @error('dependency_form.activity_name') is-invalid @enderror"
                                       placeholder="Activity Name"/>
                                @error('dependency_form.activity_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row form-group">

                            <div class="col-lg-12">
                                <label>{!! __('Remarks (if any):') !!}<span class="text-danger"></span></label>
                                <textarea wire:model.defer="dependency_form.remark" class="form-control" @error('dependency_form.fos_solution') is-invalid @enderror></textarea>
                                @error('dependency_form.remark')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <button class="btn btn-custom-color" wire:click.prevent="addDependency()" >Add</button>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Organization</th>
                                <th>Activity name</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dependencies as $index => $dependency)
                                <tr>
                                    <td>{{ optional($dependency->department)->department_name }}</td>
                                    <td>{{ $dependency->activity_name }}</td>
                                    <td>{{ $dependency->remark }}</td>
                                    <td><button wire:click.prevent="deleteDependency({{ $dependency->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end: Wizard Step 3-->

                <!--begin: Wizard Step 4-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==3){{ 'current' }}@else{{ 'done' }}@endif">
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
                                    <input @click="is_inspection= 'Manual'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Manual">
                                    <span></span>Pre-inspection</label>
                                <label class="radio radio-success">
                                    <input @click="is_inspection= 'Post-inspection'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Post-inspection">
                                    <span></span>Post-inspection</label>
                                <label class="radio radio-success">
                                    <input @click="is_inspection= 'Both'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="Both">
                                    <span></span>Both</label>
                                <label class="radio radio-success">
                                    <input @click="is_inspection= 'None'" type="radio" wire:model.defer="form.inspection_required" name="inspection_required" value="None">
                                    <span></span>None</label>
                            </div>
                        </div>

                        <div x-show.transition.opacity="is_inspection!='None'" >
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('What is the purpose of inspection?') !!}<span class="text-danger">*</span></label>
                                <input wire:model.defer="form.purpose_of_inspection" type="text"
                                       class="form-control @error('form.purpose_of_inspection') is-invalid @enderror"
                                       placeholder="Purpose of inspection"/>
                                @error('form.purpose_of_inspection')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Upload Relevant Laws') !!}<span class="text-danger">*</span></label>
                                @if(isset($form['relevant_laws_file']) && !empty($form['relevant_laws_file']))
                                    <br><a href="{{ asset('storage/'.$form['relevant_laws_file']) }}"
                                           target="_blank" class="file_viewer" title="Relevant Laws">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('relevant_laws_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['relevant_laws_file']) && !empty($form['relevant_laws_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="relevant_laws_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('relevant_laws_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Upload Relevant Rules') !!}<span class="text-danger">*</span></label>
                                @if(isset($form['relevant_rules_file']) && !empty($form['relevant_rules_file']))
                                    <br><a href="{{ asset('storage/'.$form['relevant_rules_file']) }}"
                                           target="_blank" class="file_viewer" title="Relevant Rules">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('relevant_rules_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['relevant_rules_file']) && !empty($form['relevant_rules_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="relevant_rules_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('relevant_rules_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Upload Relevant Notification') !!}<span class="text-danger">*</span></label>
                                @if(isset($form['relevant_notification_file']) && !empty($form['relevant_notification_file']))
                                    <br><a href="{{ asset('storage/'.$form['relevant_notification_file']) }}"
                                           target="_blank" class="file_viewer" title="Relevant Notification">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('relevant_notification_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['relevant_notification_file']) && !empty($form['relevant_notification_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="relevant_notification_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('relevant_notification_file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
                            <label class="control-label">Mode of Inspection <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="radio-list">
                                <label class="radio radio-success">
                                    <input type="radio"  wire:model="form.mode_of_inspection" name="mode_of_inspection" value="Manual (Physical visit with manual data entry)">
                                    <span></span>Manual (Physical visit with manual data entry)</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model="form.mode_of_inspection" name="mode_of_inspection" value="Semi Automated (Physical visit with data entry using Mobile App/System)">
                                    <span></span>Semi Automated (Physical visit with data entry using Mobile App/System)</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model="form.mode_of_inspection" name="mode_of_inspection" value="Fully Automated (No physical visit)">
                                    <span></span>Fully Automated (No physical visit)</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                    <label>{!! __('Which organization/authority do you conduct joint inspection with?') !!}<span class="text-danger"></span></label>
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

                            <div x-data="{ open: false }" class="col-lg-6">
                                <label>{!!__('Upload applicable fines/penalties/charges notification') !!}<span class="text-danger">*</span></label>
                                @if(isset($form['applicable_fines_file']) && !empty($form['applicable_fines_file']))
                                    <br><a href="{{ asset('storage/'.$form['applicable_fines_file']) }}"
                                           target="_blank" class="file_viewer" title="Applicable Fines">View File</a>
                                    &nbsp;|&nbsp;
                                    <a @click="open = true" href="javascript:;"  x-show="!open">Change File</a>
                                    <a href="javascript:;"  x-show="open" @click="open = false" wire:click.prevent="$set('applicable_fines_file', null)">Do Not Change File</a>
                                @endif

                                <input
                                    @if(isset($form['applicable_fines_file']) && !empty($form['applicable_fines_file'])) x-show="open"
                                    @endif  type="file" class="form-control" wire:model="applicable_fines_file">
                                <span class="form-text text-muted">File with extension jpg, jpeg, png, pdf are allowed, Max. upload size is 5MB.</span>
                                @error('applicable_fines_file')
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
                     data-wizard-state="@if($step==4){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('AUTOMATION') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <label class="control-label">In which form is the activity's data currently being maintained? <span class="text-danger">*</span></label>
                        </div>
                        <div class="row form-group">
                            <div class="radio-list">
                                <label class="radio radio-success">
                                    <input type="radio" wire:model="form.current_maintained"  name="current_maintained" value="Manual">
                                    <span></span>Manual</label>

                                <label class="radio radio-success">
                                    <input type="radio" wire:model="form.current_maintained" name="current_maintained" value="Semi-Automated">
                                    <span></span>Semi-Automated (e.g: Excel/Word/etc.)</label>
                                <label class="radio radio-success">
                                    <input type="radio" wire:model="form.current_maintained" name="current_maintained" value="Fully-Automated">
                                    <span></span>Fully-Automated</label>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-lg-6">
                                <label>{!! __('Online URL') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="form.online_url" type="text"
                                       class="form-control @error('form.online_url') is-invalid @enderror"
                                       placeholder="Online URL:"/>
                                @error('form.online_url')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-lg-12">
                                <label>{!! __('Remarks (if any)') !!}<span class="text-danger"></span></label>
                                <textarea wire:model.defer="form.remark" class="form-control" @error('form.remark') is-invalid @enderror></textarea>
                                @error('form.remark')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                    </div>
                </div>
                <!--end: Wizard Step 5-->

                <!--begin: Wizard Step 6-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==5){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('FAQs') !!}</span>
                    </h4>

                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('Question') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="faq_form.faq_question" type="text"
                                       class="form-control @error('faq_form.faq_question') is-invalid @enderror"
                                       placeholder="Question"/>
                                @error('faq_form.faq_question')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Order') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="faq_form.faq_order" type="text"
                                       class="form-control @error('faq_form.faq_order') is-invalid @enderror"
                                       placeholder="Order No."/>
                                @error('faq_form.faq_order')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row form-group">

                            <div class="col-lg-12">
                                <label>{!! __('Answer') !!}<span class="text-danger"></span></label>
                                <textarea wire:model.defer="faq_form.faq_answer" class="form-control" @error('faq_form.faq_answer') is-invalid @enderror></textarea>
                                @error('faq_form.faq_answer')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <button class="btn btn-custom-color" wire:click.prevent="addFaq()" >Add</button>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $index => $faq)
                                <tr>
                                    <td>{{ $faq->faq_question }}</td>
                                    <td>{{ $faq->faq_answer }}</td>
                                    <td>{{ $faq->faq_order }}</td>
                                    <td><button wire:click.prevent="deleteFaq({{ $faq->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end: Wizard Step 6-->

                <!--begin: Wizard Step 7-->
                <div class="pb-5" data-wizard-type="step-content"
                     data-wizard-state="@if($step==6){{ 'current' }}@else{{ 'done' }}@endif">
                    <h4 class="font-weight-bold section_heading text-white">
                        <span>  {!! __('FOS') !!}</span>
                    </h4>
                    <div class="section_box">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label>{!! __('Observation') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="fos_form.fos_observation" type="text"
                                       class="form-control @error('fos_form.fos_observation') is-invalid @enderror"
                                       placeholder="Observation"/>
                                @error('fos_form.fos_observation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label>{!! __('Order') !!}<span class="text-danger"></span></label>
                                <input wire:model.defer="fos_form.fos_order" type="text"
                                       class="form-control @error('fos_form.fos_order') is-invalid @enderror"
                                       placeholder="Order No."/>
                                @error('fos_form.fos_order')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row form-group">

                            <div class="col-lg-12">
                                <label>{!! __('Solution') !!}<span class="text-danger"></span></label>
                                <textarea wire:model.defer="fos_form.fos_solution" class="form-control" @error('fos_form.fos_solution') is-invalid @enderror></textarea>
                                @error('fos_form.fos_solution')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <button class="btn btn-custom-color" wire:click.prevent="addFos()" >Add</button>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Observation</th>
                                <th>Solution</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($foss as $index => $fos)
                                <tr>
                                    <td>{{ $fos->fos_observation }}</td>
                                    <td>{{ $fos->fos_solution }}</td>
                                    <td>{{ $fos->fos_order }}</td>
                                    <td><button wire:click.prevent="deleteFos({{ $fos->id }})" class="btn btn-danger text-center btn-circle btn-icon btn-xs"><i class="flaticon2-trash text-white"></i></button></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end: Wizard Step 7-->


                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between">
                    <div class="mr-2">
                        @if($step> 0 && $step<=6)
                            <button type="button"
                                    class="btn btn-custom-dark font-weight-bold px-8 py-2 d-block"
                                    data-wizard-type="action-prev"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:click.prevent="decreaseStep"
                                    wire:loading.attr="disabled">{!! __('Back') !!}
                            </button>
                        @endif
                    </div>

                    @if($step >= 6)
                        <div>
                            <button type="button"
                                    class="btn btn-custom-color font-weight-bold px-8 py-2 d-block float-left mr-10"
                                    data-wizard-type="action-next"
                                    wire:loading.class="spinner spinner-white spinner-right"
                                    wire:loading.attr="disabled"
                                    wire:click.prevent="submitForm"
                            >{!! __('Save') !!}
                            </button>

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
                                <button type="button"
                                        class="btn btn-custom-color font-weight-bold px-8 py-2 d-block float-left mr-10"
                                        data-wizard-type="action-next"
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
        window.addEventListener('reinitialization:select2', event =>{
            $(event.detail.id).select2();
            $(event.detail.id).on('change', function (e) {
            let data = $(this).val();
            @this.set(event.detail.key_name, data);
            });
        });
    </script>
@endpush
