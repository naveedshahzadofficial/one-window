<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Dependency;
use App\Models\Faq;
use App\Models\Fos;
use App\Models\Keyword;
use App\Models\OtherDocument;
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
    public $keywords;

    public $dependency_form;
    public $dependencies;

    public $faq_form;
    public $faqs;
    public  $faq_file;

    public $fos_form;
    public $foss;
    public  $fos_file;

    public $other_document_form;
    public $other_documents;
    public  $other_document_file;

    public $step;
    private $stepActions = [
        'submitZero',
        'submitBasicInfo',
        'submitProcess',
        'submitDependency',
        'submitInspection',
        'submitFAQs',
        'submitFOS',
        'submitDocuments',
    ];

    // files
    public  $process_flow_diagram_file,
            $challan_form_file, $application_form_file;

    protected $listeners = ['confirmDelete'];


    public function render()
    {
        return view('livewire.rlco-form');
    }

    public function mount()
    {
        $this->step = 1;
        $this->business_categories = BusinessCategory::where('category_status',1)->get();
        $this->business_activities = Collect();
        $this->activities = Activity::orderBy('activity_order')->where('activity_status',1)->get();
        $this->departments = Department::where('department_status',1)->get();
        $this->required_documents = RequiredDocument::where('document_status','Active')->get();
        $this->keywords = Collect();
        $this->form['admin_id'] = auth()->id();

        $this->dependencies = Collect();
        $this->faqs = Collect();
        $this->foss = Collect();

        $this->other_documents = Collect();

        if($this->rlco){
            $this->form = $this->rlco->toArray();
            $this->form['activity_ids'] = $this->rlco->activities->pluck('id');
            $this->form['required_document_ids'] = $this->rlco->requiredDocuments->pluck('id');
            $this->keywords = $this->rlco->keywords;
            $this->form['keyword_ids'] = $this->rlco->keywords->pluck('id');
            $this->form['business_activity_ids'] = $this->rlco->businessActivities->pluck('id');

            $ba_query = BusinessActivity::where('activity_status',1);
            if($this->rlco->business_category_id!=1)
                $ba_query->where('business_category_id', $this->rlco->business_category_id);
            $this->business_activities = $ba_query->get();

            $this->loadDependencies();
            $this->loadFaqs();
            $this->loadFoss();
            $this->loadOtherDocuments();
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
        if($this->step<8)
            $this->step++;
        $this->pageChangeDispatch();
    }
    private function pageChangeDispatch(){
        $this->dispatchBrowserEvent('page:tab',['change'=>true]);
    }

    public function updatedForm($value, $updatedKey)
    {
        switch ($updatedKey){
            case 'business_category_id':
                $ba_query = BusinessActivity::where('activity_status',1);
                if($value!=1)
                    $ba_query->where('business_category_id', $value);
                $this->business_activities = $ba_query->get();
                $this->dispatchBrowserEvent('child:multi-column-checkbox-select2',[
                    'data'=>$this->business_activities,
                    'field_name'=>'class_name',
                    'child_id'=>'#business_activity_ids'
                ]);
                break;

        }
    }

    public function submitForm()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    private function submitBasicInfo()
    {
        $rules = [
            'form.department_id' => 'required',
            'form.rlco_name' => 'required',
            'form.business_category_id' => 'required',
            'form.activity_ids' => 'required',
            'form.automation_status' => 'required',
        ];

        $messages = [
            'form.department_id.required' => 'Department is required.',
            'form.rlco_name.required' => 'RLCOs Name is required.',
            'form.business_category_id.required' => 'Business Category is required.',
            'form.activity_ids.required' => 'Activities is required.',
            'form.automation_status.required' => 'Automation Status is required.',
        ];

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        DB::transaction(function () {
            $this->formSaved();
            $business_activity_ids = $this->form['business_activity_ids']??null;

            $activity_ids = $this->form['activity_ids']??null;

            $keyword_ids = $this->form['keyword_ids']??null;
            $new_keyword_ids = array();
            if(!empty($keyword_ids)){
                foreach ($keyword_ids as $keyword_id){
                    if ((int)$keyword_id === 0) {
                        $keyword = Keyword::firstOrCreate(
                            ['keyword_name' => $keyword_id],
                            ['keyword_status' => 1]
                        );
                        array_push($new_keyword_ids, $keyword->id);
                    } else {
                        array_push($new_keyword_ids, $keyword_id);
                    }
                }
            }


            $this->rlco->businessActivities()->sync($business_activity_ids);
            $this->rlco->activities()->sync($activity_ids);
            $this->rlco->keywords()->sync($new_keyword_ids);

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
            $new_document_ids = array();
            if(!empty($required_document_ids)){
                foreach ($required_document_ids as $required_document_id){
                    if ((int)$required_document_id === 0) {
                        $required_document = RequiredDocument::firstOrCreate(
                            ['document_title' => $required_document_id],
                            ['document_status' => 'Active']
                        );
                        array_push($new_document_ids, $required_document->id);
                    } else {
                        array_push($new_document_ids, $required_document_id);
                    }
                }
            }

            $this->rlco->requiredDocuments()->sync($new_document_ids);

        });

    }

    private function submitDependency()
    {
        $this->formSaved();
    }

    private function submitInspection()
    {
        $rules = [
            'form.inspection_required' => 'required',
        ];
        $messages = [
            'form.inspection_required.required' => 'Inspections is required.',
        ];
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

    private function submitDocuments(){
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
        $this->dependencies = Dependency::with('department')->where('rlco_id', $this->rlco->id)->orderBy('priority')->get();
    }

    public function addDependency()
    {
        if(!$this->rlco) {
            $this->formSaved();
        }

        $rules = [
            'dependency_form.department_id' => 'required',
            'dependency_form.activity_name' => 'required',
            'dependency_form.priority' => 'required|numeric|min:1|unique:dependencies,priority,NULL,id,rlco_id,' . $this->rlco->id,

        ];
        $messages = [
            'dependency_form.department_id.required' => 'Department / Organization Name is required.',
            'dependency_form.activity_name.required' => 'RLCO Name is required.',
            'dependency_form.priority.required' => 'Priority is required.',
            'dependency_form.priority.unique' => 'Priority is already exits.',
            'dependency_form.priority.min' => 'Priority must be at least 1.',
        ];
        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);


        $this->rlco->dependencies()->create($this->dependency_form);
        $this->dispatchBrowserEvent('dependency:select2',['id'=>'#organization_id','key_name'=>'dependency_form.department_id']);
        $this->reset('dependency_form');
        $this->setEditorData('#dependency_remark-ckeditor', "");
        $this->loadDependencies();
    }

    public function editDependency($dependency_id){
        $dependency = Dependency::find($dependency_id);
        if($dependency){
            $this->dependency_form['id'] = $dependency->id;
            $this->dependency_form['department_id'] = $dependency->department_id;
            $this->dependency_form['activity_name'] = $dependency->activity_name;
            $this->dependency_form['remark'] = $dependency->remark;
            $this->dependency_form['priority'] = $dependency->priority;
            $this->dispatchBrowserEvent('select2:setValue',['id'=>'#organization_id','value'=>$dependency->department_id]);
            $this->setEditorData('#dependency_remark-ckeditor', $dependency->remark);
        }
    }

    public function updateDependency($dependency_id)
    {
        $dependency = Dependency::find($dependency_id);
        if(!$dependency){
            $this->reset('dependency_form');
            $this->dispatchBrowserEvent('dependency:select2',['id'=>'#organization_id','key_name'=>'dependency_form.department_id']);
            $this->setEditorData('#dependency_remark-ckeditor', "");
            return false;
        }

        $rules = [
            'dependency_form.department_id' => 'required',
            'dependency_form.activity_name' => 'required',
            'dependency_form.priority' => "required|numeric|min:1|unique:dependencies,priority,{$dependency_id},id,rlco_id,{$this->rlco->id}",

        ];
        $messages = [
            'dependency_form.department_id.required' => 'Department / Organization Name is required.',
            'dependency_form.activity_name.required' => 'RLCO Name is required.',
            'dependency_form.priority.required' => 'Priority is required.',
            'dependency_form.priority.unique' => 'Priority is already exits.',
            'dependency_form.priority.min' => 'Priority must be at least 1.',
        ];
        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        $dependency->update($this->dependency_form);
        $this->dispatchBrowserEvent('dependency:select2',['id'=>'#organization_id','key_name'=>'dependency_form.department_id']);
        $this->reset('dependency_form');
        $this->setEditorData('#dependency_remark-ckeditor', "");
        $this->loadDependencies();
    }

    public function dependencyUp($dependency_id, $rlco_id)
    {
        $dependency = Dependency::find($dependency_id);
        if ($dependency) {
            Dependency::where('rlco_id', $rlco_id)->where('priority', $dependency->priority - 1)->update([
                'priority' => $dependency->priority
            ]);
            $dependency->update(['priority' => $dependency->priority - 1]);
        }
        $this->loadDependencies();
    }
    public function dependencyDown($dependency_id, $rlco_id)
    {
        $dependency = Dependency::find($dependency_id);
        if ($dependency) {
            Dependency::where('rlco_id', $rlco_id)->where('priority', $dependency->priority + 1)->update([
                'priority' => $dependency->priority
            ]);
            $dependency->update(['priority' => $dependency->priority + 1]);
        }
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
        if(!$this->rlco) {
            $this->formSaved();
        }

        $rules = [
            'faq_form.faq_question' => 'required',
            'faq_form.faq_order' => 'required|numeric|min:1|unique:faqs,faq_order,NULL,id,rlco_id,' . $this->rlco->id,
            'faq_form.faq_answer' => 'required',
        ];
        $messages = [
            'faq_form.faq_question.required' => 'Question is required.',
            'faq_form.faq_order.required' => 'Order No. is required.',
            'faq_form.faq_order.unique' => 'Order No. is already exits.',
            'faq_form.faq_order.min' => 'Order No. must be at least 1.',
            'faq_form.faq_answer.required' => 'Answer is required.',
        ];

        if(!empty($this->faq_file)) {
            $rules['faq_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['faq_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);


        if(!empty($this->faq_file)) {
            $this->faq_form['faq_file'] = $this->faq_file->store('faq_files', 'public');
            $this->faq_file = null;
        }

        $this->rlco->faqs()->create($this->faq_form);
        $this->reset('faq_form');
        $this->setEditorData('#faq_answer-ckeditor', "");
        $this->loadFaqs();
    }
    public function editFaq($faq_id){
        $faq = Faq::find($faq_id);
        if($faq){
            $this->faq_form['id'] = $faq->id;
            $this->faq_form['faq_question'] = $faq->faq_question;
            $this->faq_form['faq_order'] = $faq->faq_order;
            $this->faq_form['faq_file'] = $faq->faq_file;
            $this->faq_form['faq_answer'] = $faq->faq_answer;
            $this->faq_file = null;
            $this->setEditorData('#faq_answer-ckeditor', $faq->faq_answer);
        }
    }
    public function updateFaq($faq_id){
        $faq = Faq::find($faq_id);
        if(!$faq){
            $this->reset('faq_form');
            $this->setEditorData('#faq_answer-ckeditor', "");
            return false;
        }

        $rules = [
            'faq_form.faq_question' => 'required',
            'faq_form.faq_order' => "required|numeric|min:1|unique:faqs,faq_order,{$faq_id},id,rlco_id,{$this->rlco->id}",
            'faq_form.faq_answer' => 'required',
        ];
        $messages = [
            'faq_form.faq_question.required' => 'Question is required.',
            'faq_form.faq_order.required' => 'Order No. is required.',
            'faq_form.faq_order.unique' => 'Order No. is already exits.',
            'faq_form.faq_order.min' => 'Order No. must be at least 1.',
            'faq_form.faq_answer.required' => 'Answer is required.',
        ];

        if(!empty($this->faq_file)) {
            $rules['faq_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['faq_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);


        if(!empty($this->faq_file)) {
            $this->faq_form['faq_file'] = $this->faq_file->store('faq_files', 'public');
            $this->faq_file = null;
        }

        $faq->update($this->faq_form);
        $this->reset('faq_form');
        $this->setEditorData('#faq_answer-ckeditor', "");
        $this->loadFaqs();

    }

    public function deleteFaq($faq_id)
    {
        $faq = Faq::find($faq_id);
        $this->resetFaqOrder($faq->rlco_id, $faq->faq_order);
        $faq->delete();
        $this->loadFaqs();
    }
    public function resetFaqOrder($rlco_id, $order_no){
        Faq::where('rlco_id', $rlco_id)->where('faq_order','>',$order_no)->decrement('faq_order');
    }

    public function addFos()
    {
        if(!$this->rlco) {
            $this->formSaved();
        }

        $rules = [
            'fos_form.fos_observation' => 'required',
            'fos_form.fos_order' => 'required|numeric|min:1|unique:fos,fos_order,NULL,id,rlco_id,' . $this->rlco->id,
        ];
        $messages = [
            'fos_form.fos_observation.required' => 'Observation is required.',
            'fos_form.fos_order.required' => 'Order No. is required.',
            'fos_form.fos_order.unique' => 'Order No. is already exits.',
            'fos_form.fos_order.min' => 'Order No. must be at least 1.',

        ];

        if(!empty($this->fos_file)) {
            $rules['fos_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['fos_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);


        if(!empty($this->fos_file)) {
            $this->fos_form['fos_file'] = $this->fos_file->store('fos_files', 'public');
            $this->fos_file = null;
        }

        $this->rlco->foss()->create($this->fos_form);

        $this->reset('fos_form');
        $this->loadFoss();
    }
    public function fosUp($fos_id, $rlco_id)
    {
        $fos = Fos::find($fos_id);
        if ($fos) {
            Fos::where('rlco_id', $rlco_id)->where('fos_order', $fos->fos_order - 1)->update([
                'fos_order' => $fos->fos_order
            ]);
            $fos->update(['fos_order' => $fos->fos_order - 1]);
        }
        $this->loadFoss();
    }
    public function fosDown($fos_id, $rlco_id)
    {
        $fos = Fos::find($fos_id);
        if ($fos) {
            Fos::where('rlco_id', $rlco_id)->where('fos_order', $fos->fos_order + 1)->update([
                'fos_order' => $fos->fos_order
            ]);
            $fos->update(['fos_order' => $fos->fos_order + 1]);
        }
        $this->loadFoss();
    }
    public function editFos($fos_id){
        $fos = Fos::find($fos_id);
        if($fos){
            $this->fos_form['id'] = $fos->id;
            $this->fos_form['fos_observation'] = $fos->fos_observation;
            $this->fos_form['fos_order'] = $fos->fos_order;
            $this->fos_form['fos_file'] = $fos->fos_file;
            $this->fos_file = null;
        }
    }
    public function deleteFos($fos_id)
    {
        $fos = Fos::find($fos_id);
        $this->resetFosOrder($fos->rlco_id, $fos->fos_order);
        $fos->delete();
        $this->loadFoss();
    }
    public function updateFos($fos_id){
        $fos = Fos::find($fos_id);
        if(!$fos){
            $this->reset('fos_form');
            return false;
        }

        $rules = [
            'fos_form.fos_observation' => 'required',
            'fos_form.fos_order' => 'required|numeric|min:1|unique:fos,fos_order,'.$fos_id.',id,rlco_id,' . $this->rlco->id,
        ];
        $messages = [
            'fos_form.fos_observation.required' => 'Observation is required.',
            'fos_form.fos_order.required' => 'Order No. is required.',
            'fos_form.fos_order.unique' => 'Order No. is already exits.',
            'fos_form.fos_order.min' => 'Order No. must be at least 1.',

        ];

        if(!empty($this->fos_file)) {
            $rules['fos_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['fos_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        if(!empty($this->fos_file)) {
            $this->fos_form['fos_file'] = $this->fos_file->store('fos_files', 'public');
            $this->fos_file = null;
        }

        $fos->update($this->fos_form);
        $this->reset('fos_form');
        $this->loadFoss();

    }

    private function loadFoss()
    {
        $this->foss = Fos::where('rlco_id', $this->rlco->id)->orderBy('fos_order')->get();
    }
    public function resetFosOrder($rlco_id, $order_no){
        Fos::where('rlco_id', $rlco_id)->where('fos_order','>',$order_no)->decrement('fos_order');
    }

    public function addOtherDocument()
    {
        if(!$this->rlco) {
            $this->formSaved();
        }

        $rules = [
            'other_document_form.document_title' => 'required',
            'other_document_file' => 'required',
            'other_document_form.document_order' => 'required|numeric|min:1|unique:other_documents,document_order,NULL,id,rlco_id,' . $this->rlco->id,
        ];
        $messages = [
            'other_document_form.document_title.required' => 'Title is required.',
            'other_document_form.document_order.required' => 'Order No. is required.',
            'other_document_form.document_order.unique' => 'Order No. is already exits.',
            'other_document_form.document_order.min' => 'Order No. must be at least 1.',
            'other_document_file.required' => 'Attachment is required.',
        ];

        if(!empty($this->other_document_file)) {
            $rules['other_document_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['other_document_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);


        if(!empty($this->other_document_file)) {
            $this->other_document_form['document_file'] = $this->other_document_file->store('other_document_files', 'public');
            $this->other_document_file = null;
        }

        $this->rlco->otherDocuments()->create($this->other_document_form);
        $this->reset('other_document_form');
        $this->loadOtherDocuments();
    }

    public function deleteOtherDocument($doc_id)
    {
        $doc = OtherDocument::find($doc_id);
        $this->resetDocumentOrder($doc->rlco_id, $doc->document_order);
        $doc->delete();
        $this->loadOtherDocuments();
    }

    private function loadOtherDocuments()
    {
        $this->other_documents = OtherDocument::where('rlco_id', $this->rlco->id)->orderBy('document_order')->get();
    }

    public function confirmDialog($type, $id){
        $this->dispatchBrowserEvent('confirm:delete',[
            'type'=> $type,
            'id'=> $id,
        ]);
    }

    public function confirmDelete($type, $id){
        switch (strtolower(trim($type))){
            case 'dependency':
                $this->deleteDependency($id);
                break;
            case 'faq':
                $this->deleteFaq($id);
                break;
            case 'fos':
                $this->deleteFos($id);
                break;
            case 'other_document':
                $this->deleteOtherDocument($id);
                break;
        }
    }

    public function otherDocumentUp($document_id, $rlco_id)
    {
        $document = OtherDocument::find($document_id);
        if ($document) {
            OtherDocument::where('rlco_id', $rlco_id)->where('document_order', $document->document_order - 1)->update([
                'document_order' => $document->document_order
            ]);
            $document->update(['document_order' => $document->document_order - 1]);
        }
        $this->loadOtherDocuments();
    }
    public function otherDocumentDown($document_id, $rlco_id)
    {
        $document = OtherDocument::find($document_id);
        if ($document) {
            OtherDocument::where('rlco_id', $rlco_id)->where('document_order', $document->document_order + 1)->update([
                'document_order' => $document->document_order
            ]);
            $document->update(['document_order' => $document->document_order + 1]);
        }
        $this->loadOtherDocuments();
    }
    public function editOtherDocument($document_id){
        $document = OtherDocument::find($document_id);
        if($document){
           $this->other_document_form['id'] = $document->id;
           $this->other_document_form['document_title'] = $document->document_title;
           $this->other_document_form['document_file'] = $document->document_file;
           $this->other_document_form['document_order'] = $document->document_order;
           $this->other_document_file = null;
        }
    }
    public function updateOtherDocument($document_id){
        $document = OtherDocument::find($document_id);
        if(!$document){
            $this->reset('other_document_form');
            return false;
        }
        $rules = [
            'other_document_form.document_title' => 'required',
            'other_document_form.document_order' => 'required|numeric|min:1|unique:other_documents,document_order,'.$document_id.',id,rlco_id,' . $this->rlco->id,
        ];
        $messages = [
            'other_document_form.document_title.required' => 'Title is required.',
            'other_document_form.document_order.required' => 'Order No. is required.',
            'other_document_form.document_order.unique' => 'Order No. is already exits.',
        ];

        if(!empty($this->other_document_file)) {
            $rules['other_document_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['other_document_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        if(!empty($this->other_document_file)) {
            $this->other_document_form['document_file'] = $this->other_document_file->store('other_document_files', 'public');
            $this->other_document_file = null;
        }

        $document->update($this->other_document_form);
        $this->reset('other_document_form');
        $this->loadOtherDocuments();

    }
    public function resetDocumentOrder($rlco_id, $order_no){
        OtherDocument::where('rlco_id', $rlco_id)->where('document_order','>',$order_no)->decrement('document_order');
    }

    private function setEditorData($editor_id, $text){
        $this->dispatchBrowserEvent('editor:setData',[
            'editor_id'=> $editor_id,
            'editor_text'=> $text,
        ]);
    }
}
