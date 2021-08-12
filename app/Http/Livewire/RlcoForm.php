<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Faq;
use App\Models\Fos;
use App\Models\RequiredDocument;
use App\Models\Rlco;
use Livewire\Component;
use Livewire\WithFileUploads;

class RlcoForm extends Component
{
    use WithFileUploads;
    public $form;
    public $faq_form;
    public $faqs;

    public $fos_form;
    public $foss;

    private $rlco;
    public $business_categories;
    public $business_activities;
    public $departments;
    public $required_documents;
    public $activities;

    public $step;
    private $stepActions = [
        'submitBasicInfo',
        'submitProcess',
        'submitInspection',
        'submitAutomation',
        'submitFAQs',
        'submitFOS',
    ];

    // files
    public $relevant_order_file, $process_flow_diagram_file,
            $challan_form_file, $application_form_file,
            $relevant_laws_file,
            $relevant_rules_file, $relevant_notification_file,
            $applicable_fines_file;

    public $is_inspection = false;

    public function render()
    {
        return view('livewire.rlco-form');
    }

    public function mount($rlco=null)
    {
        $this->rlco = null;
        $this->step = 0;

        $this->business_categories = BusinessCategory::where('category_status',1)->get();
        $this->business_activities = BusinessActivity::where('activity_status',1)->get();
        $this->activities = Activity::orderBy('activity_order')->where('activity_status',1)->get();
        $this->departments = Department::where('department_status',1)->get();
        $this->required_documents = RequiredDocument::where('document_status','Active')->get();
        $this->faqs = Faq::where('admin_id',auth()->id())->get();
        $this->foss = Fos::where('admin_id',auth()->id())->get();
        $this->form['admin_id'] = auth()->id();

    }
    public function decreaseStep()
    {
        if($this->step>0)
            $this->step--;
        $this->pageChangeDispatch();
    }
    public function increaseStep()
    {
        if($this->step<5)
            $this->step++;
        $this->pageChangeDispatch();
    }
    private function pageChangeDispatch(){
        $this->dispatchBrowserEvent('page:tab',['change'=>true]);
    }

    public function submitForm()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    private function submitBasicInfo()
    {
        $this->formSaved();

    }

    private function submitProcess()
    {
        $rules = [];
        $messages = [];

        if(!empty($this->relevant_order_file)) {
            $rules['relevant_order_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['relevant_order_file.mimes'] = 'Relevant Notification/Order must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->process_flow_diagram_file)) {
            $rules['process_flow_diagram_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['process_flow_diagram_file.mimes'] = 'Process Flow Diagram must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->challan_form_file)) {
            $rules['challan_form_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['challan_form_file.mimes'] = 'Challan form must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->application_form_file)) {
            $rules['application_form_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['application_form_file.mimes'] = 'Application Form must be a file of type: jpg, jpeg, png, pdf.';
        }

        $this->validate($rules,$messages);

        if(!empty($this->relevant_order_file)) {
            $this->form['relevant_order_file'] = $this->relevant_order_file->store('relevant_order_files', 'public');
            $this->relevant_order_file = null;
        }

        if(!empty($this->process_flow_diagram_file)) {
            $this->form['process_flow_diagram_file'] = $this->process_flow_diagram_file->store('process_flow_diagram_files', 'public');
            $this->process_flow_diagram_file = null;
        }

        if(!empty($this->challan_form_file)) {
            $this->form['challan_form_file'] = $this->challan_form_file->store('challan_form_files', 'public');
            $this->challan_form_file = null;
        }

        if(!empty($this->application_form_file)) {
            $this->form['application_form_file'] = $this->application_form_file->store('application_form_files', 'public');
            $this->application_form_file = null;
        }

        $this->formSaved();

    }

    private function submitInspection()
    {
        $rules = [];
        $messages = [];

        if(!empty($this->relevant_laws_file)) {
            $rules['relevant_laws_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['relevant_laws_file.mimes'] = 'Relevant Laws must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->relevant_rules_file)) {
            $rules['relevant_rules_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['relevant_rules_file.mimes'] = 'Relevant Rules must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->relevant_notification_file)) {
            $rules['relevant_notification_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['relevant_notification_file.mimes'] = 'Relevant Notification must be a file of type: jpg, jpeg, png, pdf.';
        }

        if(!empty($this->applicable_fines_file)) {
            $rules['applicable_fines_file'] = 'mimes:jpg,jpeg,png,pdf|max:5120';
            $messages['applicable_fines_file.mimes'] = 'Applicable Fines must be a file of type: jpg, jpeg, png, pdf.';
        }

        $this->validate($rules,$messages);

        if(!empty($this->relevant_laws_file)) {
            $this->form['relevant_laws_file'] = $this->relevant_laws_file->store('relevant_laws_files', 'public');
            $this->relevant_laws_file = null;
        }
        if(!empty($this->relevant_rules_file)) {
            $this->form['relevant_rules_file'] = $this->relevant_rules_file->store('relevant_rules_files', 'public');
            $this->relevant_rules_file = null;
        }

        if(!empty($this->relevant_notification_file)) {
            $this->form['relevant_notification_file'] = $this->relevant_notification_file->store('relevant_notification_files', 'public');
            $this->relevant_notification_file = null;
        }

        if(!empty($this->applicable_fines_file)) {
            $this->form['applicable_fines_file'] = $this->applicable_fines_file->store('applicable_fines_files', 'public');
            $this->applicable_fines_file = null;
        }

        $this->formSaved();

    }

    private function submitAutomation()
    {
        $this->formSaved();

    }

    private function submitFAQs()
    {
        $this->formSaved();
    }

    private function submitFOS()
    {
        $this->formSaved();
    }

    private function formSaved()
    {
        if($this->rlco)
            $this->rlco = tap($this->rlco)->update($this->form);
        else
            $this->rlco = Rlco::create($this->form);
        $this->successAlert();
    }

    public function addFaq()
    {
        if(!$this->rlco)
            $this->formSaved();
        $this->faq_form['rlco_id'] = $this->rlco->id;
        $this->faq_form['admin_id'] = auth()->id();
        Faq::create($this->faq_form);
        $this->reset('faq_form');
        $this->faqs = Faq::where('admin_id',auth()->id())->get();
    }

    public function deleteFaq($faq_id)
    {
       $faq = Faq::find($faq_id);
       $faq->delete();
       $this->faqs = Faq::where('admin_id',auth()->id())->get();
    }

    public function addFos()
    {
        if(!$this->rlco)
            $this->formSaved();

        $this->fos_form['rlco_id'] = $this->rlco->id;
        $this->fos_form['admin_id'] = auth()->id();
        Fos::create($this->fos_form);
        $this->reset('fos_form');
        $this->foss = Fos::where('admin_id',auth()->id())->get();
    }

    public function deleteFos($fos_id)
    {
        $fos = Fos::find($fos_id);
        $fos->delete();
        $this->foss = Fos::where('admin_id',auth()->id())->get();
    }

    private function successAlert(){
        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }

}
