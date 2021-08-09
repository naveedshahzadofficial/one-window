<?php

namespace App\Http\Livewire;

use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class RlcoForm extends Component
{
    use WithFileUploads;
    public $form;

    private $rlco;
    public $business_categories;
    public $business_activities;

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

}
