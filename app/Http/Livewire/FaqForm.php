<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use App\Models\Rlco;
use Livewire\Component;

class FaqForm extends Component
{
    public $form;
    public $rlco;

    public $faq_form;
    public $faqs;

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
         if(!$this->rlco) {
             $this->rlco = Rlco::create($this->form);
             $this->emit('setRlcoId',$this->rlco->id);
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
