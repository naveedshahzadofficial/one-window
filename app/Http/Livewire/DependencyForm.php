<?php

namespace App\Http\Livewire;

use App\Models\Dependency;
use App\Models\Rlco;
use Livewire\Component;

class DependencyForm extends Component
{
    public $form;
    public $rlco;

    public $dependency_form;
    public $dependencies;

    public $departments;

    protected $listeners = ['setRlcoId'];
    public function setRlcoId($rlco_id)
    {
        if(!$this->rlco)
            $this->rlco =  Rlco::find($rlco_id);
    }

    public function mount()
    {
        $this->form['admin_id'] = auth()->id();

        $this->dependencies = Collect();
        if($this->rlco){
            $this->loadDependencies();
        }
    }

    public function render()
    {
        return view('livewire.dependency-form');
    }

    public function addDependency()
    {
        if(!$this->rlco) {
            $this->rlco = Rlco::create($this->form);
            $this->emit('setRlcoId',$this->rlco->id);
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

    private function loadDependencies()
    {
        $this->dependencies = Dependency::with('department')->where('rlco_id', $this->rlco->id)->get();
    }
}
