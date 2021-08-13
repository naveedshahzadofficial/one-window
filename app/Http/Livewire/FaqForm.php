<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqForm extends Component
{
    public $rlco;
    public $faq_form;
    public $faqs;

    public function mount()
    {
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
         if(!$this->rlco)
             $this->emit('formSaved');

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
        $this->faqs = Faq::where('admin_id',auth()->id())->where('rlco_id', $this->rlco->id)->get();
    }
}
