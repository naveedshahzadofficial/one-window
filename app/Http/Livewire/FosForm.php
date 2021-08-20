<?php

namespace App\Http\Livewire;

use App\Models\Fos;
use App\Models\Rlco;
use Livewire\Component;
use Livewire\WithFileUploads;

class FosForm extends Component
{
    use WithFileUploads;

    public $form;
    public $rlco;

    public $fos_form;
    public $foss;

    public  $fos_file;

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
        $rules = array();
        $messages = array();

        if(!empty($this->fos_file)) {
            $rules['fos_file'] = 'mimes:jpg,jpeg,png,pdf,doc,docx|max:5120';
            $messages['fos_file.mimes'] = 'Attachment must be a file of type: jpg, jpeg, png, pdf, doc, docx.';
        }

        if(!empty($rules) && !empty($messages))
            $this->validate($rules,$messages);

        if(!$this->rlco) {
            $this->rlco = Rlco::create($this->form);
            $this->emit('setRlcoId',$this->rlco->id);
        }

        if(!empty($this->fos_file)) {
            $this->form['fos_file'] = $this->fos_file->store('fos_files', 'public');
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
