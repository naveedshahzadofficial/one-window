<?php

namespace App\Http\Livewire;

use App\Models\MobileCode;
use App\Models\TelecomCompany;
use Livewire\Component;

class ApplicationForm extends Component
{
    public $prefixes;
    public $application;
    public $telecom_companies;
    public $mobile_codes;

    public function mount()
    {
        $this->prefixes = ['Mr.','Ms.','Mrs.','Dr.'];
        $this->telecom_companies = TelecomCompany::where('company_status',1)->get();
        $this->application['telecom_company_id'] = $this->telecom_companies->first()->id ?? null;
        $this->mobile_codes = MobileCode::where('telecom_company_id',$this->application['telecom_company_id'])->where('code_status',1)->get();
        $this->application['mobile_code_id'] = $this->mobile_codes->first()->id ?? null;
    }

    public function render()
    {
        return view('livewire.application-form');
    }
}
