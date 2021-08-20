<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use App\Models\Rlco;
use Livewire\Component;
use Livewire\WithFileUploads;

class FaqForm extends Component
{
    use WithFileUploads;

    public $form;
    public $rlco;

    public $faq_form;
    public $faqs;

    public  $faq_file;

    protected $listeners = ['setRlcoId'];

    public function setRlcoId($rlco_id)
    {
        if(!$this->rlco)
        $this->rlco =  Rlco::find($rlco_id);
    }

    public function mount()
    {
        $this->form['admin_id'] = auth()->id();

        $this->faqs = Collect();
        if($this->rlco){
            $this->loadFaqs();
        }
    }
    public function render()
    {
        return view('livewire.faq-form');
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
             $this->rlco = Rlco::create($this->form);
             $this->emit('setRlcoId',$this->rlco->id);
         }

        if(!empty($this->faq_file)) {
            $this->form['faq_file'] = $this->faq_file->store('faq_files', 'public');
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

    private function loadFaqs(){
        $this->faqs = Faq::where('rlco_id', $this->rlco->id)->orderBy('faq_order')->get();
    }
}
