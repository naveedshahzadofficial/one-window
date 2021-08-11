<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Faq;
use App\Models\Fos;
use App\Models\RequiredDocument;
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
        'submitReview',
        'submission',
    ];

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
        dd($this->form);
    }

    private function submitProcess()
    {

    }

    private function submitInspection()
    {

    }

    private function submitAutomation()
    {

    }

    private function submitReview()
    {

    }

    private function submission()
    {

    }

    public function addFaq()
    {
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

}
