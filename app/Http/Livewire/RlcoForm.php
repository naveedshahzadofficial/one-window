<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Dependency;
use App\Models\Faq;
use App\Models\Fos;
use App\Models\RequiredDocument;
use App\Models\Rlco;
use App\Models\RlcoKeyword;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class RlcoForm extends Component
{
    use WithFileUploads;
    public $form;
    public $rlco;


    public $business_categories;
    public $business_activities;
    public $departments;
    public $required_documents;
    public $activities;
    public $rlcos_keywords;

    public $dependency_form;
    public $dependencies;

    public $faq_form;
    public $faqs;
    public  $faq_file;

    public $fos_form;
    public $foss;
    public  $fos_file;

    public $step;
    private $stepActions = [
        'submitZero',
        'submitBasicInfo',
        'submitProcess',
        'submitDependency',
        'submitInspection',
        'submitFAQs',
        'submitFOS',
    ];

    // files
    public  $process_flow_diagram_file,
            $challan_form_file, $application_form_file;


    public function render()
    {
        return view('livewire.rlco-form');
    }

    public function mount()
    {
        $this->step = 1;
        $this->business_categories = BusinessCategory::where('category_status',1)->get();
        $this->business_activities = BusinessActivity::where('activity_status',1)->get();
        $this->activities = Activity::orderBy('activity_order')->where('activity_status',1)->get();
        $this->departments = Department::where('department_status',1)->get();
        $this->required_documents = RequiredDocument::where('document_status','Active')->get();
        $this->rlcos_keywords = Collect();
        $this->form['admin_id'] = auth()->id();

        $this->dependencies = Collect();
        $this->faqs = Collect();
        $this->foss = Collect();

        if($this->rlco){
            $this->form = $this->rlco->toArray();
            $this->form['activity_ids'] = $this->rlco->activities->pluck('id');
            $this->form['required_document_ids'] = $this->rlco->requiredDocuments->pluck('id');
            $this->rlcos_keywords = $this->rlco->rlcoKeywords;
            $this->form['keyword_names'] = $this->rlco->rlcoKeywords->pluck('keywords');
            $this->loadDependencies();
            $this->loadFaqs();
            $this->loadFoss();
        }
    }

    public function decreaseStep()
    {
        if($this->step>1)
            $this->step--;
        $this->pageChangeDispatch();
    }
    public function increaseStep()
    {
        if($this->step<7)
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

        DB::transaction(function () {
            $this->formSaved();
            $activity_ids = $this->form['activity_ids']??null;
            $keyword_names = $this->form['keyword_names']??null;
            if(!empty($activity_ids))
            $this->rlco->activities()->sync($activity_ids);

            $this->rlco->rlcoKeywords()->delete();

            if(!empty($keyword_names)){
                $keyword_names = Collect($keyword_names);
                $collectionKeywords = $keyword_names->map(function ($keyword){
                    return new RlcoKeyword(['keyword_name'=>$keyword]);
                });
                $this->rlco->rlcoKeywords()->saveMany($collectionKeywords);
            }

        });

    }

    private function submitProcess()
    {
        $rules = [];
        $messages = [];



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

        if(!empty($rules) && !empty($messages))
        $this->validate($rules,$messages);


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
        DB::transaction(function () {
        $this->formSaved();
            $required_document_ids = $this->form['required_document_ids']??null;
            if(!empty($required_document_ids))
                $this->rlco->requiredDocuments()->sync($required_document_ids);
        });

    }

    private function submitDependency()
    {
        $this->formSaved();
    }

    private function submitInspection()
    {
        $rules = [];
        $messages = [];


        if(!empty($rules) && !empty($messages))
        $this->validate($rules,$messages);

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

    public function finalSubmitForm()
    {
        $this->formSaved();
        session()->flash('success_message', 'RLCOs has been saved successfully.');
        return $this->redirect(route('admin.rlcos.index'));
    }

    private function formSaved()
    {
        if($this->rlco)
            $this->rlco = tap($this->rlco)->update($this->form);
        else
            $this->rlco = Rlco::create($this->form);

        $this->successAlert();
    }


    private function successAlert(){
        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }

    private function loadDependencies()
    {
        $this->dependencies = Dependency::with('department')->where('rlco_id', $this->rlco->id)->get();
    }

    public function addDependency()
    {
        if(!$this->rlco) {
            $this->formSaved();
        }

        $this->dependency_form['rlco_id'] = $this->rlco->id;
        $this->dependency_form['admin_id'] = auth()->id();
        Dependency::create($this->dependency_form);
        $this->dispatchBrowserEvent('dependency:select2',['id'=>'#organization_id','key_name'=>'dependency_form.department_id']);
        $this->reset('dependency_form');
        $this->loadDependencies();
    }

    public function deleteDependency($dependency_id)
    {
        $faq = Dependency::find($dependency_id);
        $faq->delete();
        $this->loadDependencies();
    }

    private function loadFaqs(){
        $this->faqs = Faq::where('rlco_id', $this->rlco->id)->orderBy('faq_order')->get();
    }

    public function addFaq()
    {
        $rules = array();
        $messages = array();

        if(!empty($this->faq_file)) {
            $rules['faq_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['faq_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        if(!$this->rlco) {
            $this->formSaved();
         }

        if(!empty($this->faq_file)) {
            $this->faq_form['faq_file'] = $this->faq_file->store('faq_files', 'public');
            $this->faq_file = null;
        }

        $this->faq_form['rlco_id'] = $this->rlco->id;
        $this->faq_form['admin_id'] = auth()->id();
        Faq::create($this->faq_form);
        $this->reset('faq_form');
        $this->loadFaqs();
    }

    public function deleteFaq($faq_id)
    {
        $faq = Faq::find($faq_id);
        $faq->delete();
        $this->loadFaqs();
    }

    public function addFos()
    {
        $rules = array();
        $messages = array();

        if(!empty($this->fos_file)) {
            $rules['fos_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['fos_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        if(!$this->rlco) {
            $this->formSaved();
        }

        if(!empty($this->fos_file)) {
            $this->fos_form['fos_file'] = $this->fos_file->store('fos_files', 'public');
            $this->fos_file = null;
        }

        $this->fos_form['rlco_id'] = $this->rlco->id;
        $this->fos_form['admin_id'] = auth()->id();
        Fos::create($this->fos_form);
        $this->reset('fos_form');
        $this->loadFoss();
    }

    public function deleteFos($fos_id)
    {
        $fos = Fos::find($fos_id);
        $fos->delete();
        $this->loadFoss();
    }

    private function loadFoss()
    {
        $this->foss = Fos::where('rlco_id', $this->rlco->id)->get();
    }

}
