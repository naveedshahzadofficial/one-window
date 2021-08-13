<?php

namespace App\Http\Livewire;

use App\Models\Faq;
use Livewire\Component;

class FaqForm extends Component
{
    public function render()
    {
        return view('livewire.faq-form');
    }

    public function addFaq()
    {
        $this->faq_form['rlco_id'] = $this->rlco->id;
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
}
