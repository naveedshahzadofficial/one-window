<?php

namespace App\Http\Livewire;

use App\Models\Fos;
use App\Models\Rlco;
use Livewire\Component;

class FosForm extends Component
{
    public $form;
    public $rlco;

    public $fos_form;
    public $foss;

    protected $listeners = ['setRlcoId'];
    public function setRlcoId($rlco_id)
    {
        if(!$this->rlco)
            $this->rlco =  Rlco::find($rlco_id);
    }

    public function mount()
    {
        $this->form['admin_id'] = auth()->id();

        $this->foss = Collect();
        if($this->rlco){
            $this->loadFoss();
        }
    }

    public function render()
    {
        return view('livewire.fos-form');
    }

    public function addFos()
    {
        if(!$this->rlco) {
            $this->rlco = Rlco::create($this->form);
            $this->emit('setRlcoId',$this->rlco->id);
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
