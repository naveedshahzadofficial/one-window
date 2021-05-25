<?php

namespace App\Http\Livewire;

use App\Models\MobileCode;
use App\Models\User;
use App\Models\TelecomCompany;
use Livewire\Component;
use Manny;

class Registration extends Component
{
    public $prefixes;
    public $telecom_companies;
    public $mobile_codes = [];
    public $user;
    protected $rules = [
        'user.prefix' => 'required',
        'user.first_name' => 'required|string',
        'user.middle_name' => 'string',
        'user.last_name' => 'required|string',
        'user.cnic_no' => 'required',
        'user.telecom_company_id' => 'required',
        'user.mobile_code_id' => 'required',
        'user.mobile_no' => 'required|unique:users,mobile_no',
        'user.email' => 'required|string|email|unique:users,email',
        'user.password' => 'required|string|min:8|confirmed',
    ];
    protected $messages = [
        'user.prefix.required' => 'Prefix is required.',
        'user.first_name.required' => 'First Name is required.',
        'user.last_name.required' => 'First Name is required.',
        'user.cnic_no.required' => 'CNIC is required.',
        'user.telecom_company_id.required' => 'Company is required.',
        'user.mobile_code_id.required' => 'Code is required.',
        'user.mobile_no.required' => 'Mobile No. is required.',
        'user.mobile_no.unique' => 'Mobile No. is already register.',
        'user.email.required' => 'Email is required.',
        'user.email.email' => 'Email format is not valid.',
        'user.email.unique' => 'Email is already register.',
        'user.password.required' => 'Password is required.',
        'user.password.confirmed' => 'Password must be same as confirm password.',
    ];

    public function mount()
    {
        $this->prefixes = ['Mr.','Ms.','Mrs.','Dr.'];
        $this->telecom_companies = TelecomCompany::where('company_status',1)->get();
        $this->user['telecom_company_id'] = $this->telecom_companies->first()->id ?? null;
        $this->mobile_codes = MobileCode::where('telecom_company_id',$this->user['telecom_company_id'])->where('code_status',1)->get();
        $this->user['mobile_code_id'] = $this->mobile_codes->first()->id ?? null;

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updatedUser($value, $updatedKey)
    {
        switch ($updatedKey){
            case 'telecom_company_id':
                $this->mobile_codes = MobileCode::where('telecom_company_id',$value)->where('code_status',1)->get();
                break;
            case 'cnic_no':
                $this->user['cnic_no'] = Manny::mask($this->user['cnic_no'], "11111-1111111-1");
                break;
            case 'mobile_no':
                $this->user['mobile_no'] = Manny::mask($this->user['mobile_no'], "1111111");
                break;
        }
    }

    public function render()
    {
        return view('livewire.registration');
    }

    public function sendVerificationCode()
    {
        $this->validate([
            'user.mobile_no' => 'required|unique:users,mobile_no',
            'user.email' => 'required|string|email|unique:users,email',
        ]);
    }

    public function submitFormRegistration()
    {
        $this->validate();
        dd($this->user);
    }
}
