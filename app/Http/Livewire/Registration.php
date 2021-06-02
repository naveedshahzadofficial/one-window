<?php

namespace App\Http\Livewire;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Models\MobileCode;
use App\Models\OtpCode;
use App\Models\User;
use App\Models\TelecomCompany;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Registration extends Component
{
    public $prefixes;
    public $telecom_companies;
    public $mobile_codes = [];
    public $user;
    public $box_verification = false;
    public $btn_get_code = true;
    public $mobile_otp_code;
    public $email_otp_code;
    public $mobile_number;
    public $verified_at = null;
    public $fail_verified = false;
    public $verified_message = false;

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
        'user.password.min' => 'The Password must be at least 8 characters.',
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
        }
    }

    public function render()
    {
        return view('livewire.registration');
    }

    public function sendVerificationCode()
    {
        $this->validate([
            'user.telecom_company_id' => 'required',
            'user.mobile_code_id' => 'required',
            'user.mobile_no' => 'required|unique:users,mobile_no',
            'user.email' => 'required|string|email|unique:users,email',
        ]);

        $this->box_verification = true;
        $this->btn_get_code = false;
        $mobile_code = $this->mobile_codes->firstWhere('id', $this->user['mobile_code_id']);
        $this->mobile_number = $mobile_code->code_number.$this->user['mobile_no'];

        $mobile_otp = mt_rand(100000, 999999);
        $email_otp = mt_rand(100000, 999999);

        $data = new \stdClass;
        $data->name = isset($this->user['first_name'])?$this->user['first_name']:'Applicant';
        $data->otp_code = $email_otp;
        $message_sms = "Your OTP is " . $mobile_otp . ". Use this OTP for verification on";
        $message_sms .= " SMERP. Do not give this OTP to anyone.";

        OtpCode::create([
            'otp_type'=>'Registration',
            'email'=> $this->user['email'],
            'mobile_no'=> $this->mobile_number,
            'mobile_otp_code'=> $mobile_otp,
            'email_otp_code'=> $email_otp,
            'ip_address'=> Request::ip(),
        ]);

        //SendSmsJob::dispatch($this->mobile_number, $message_sms);
        //SendEmailJob::dispatch($this->user['email'],$data,'Registration');

    }

    public function verificationCode()
    {
       $otp = OtpCode::where('mobile_otp_code',$this->mobile_otp_code)
                ->where('email_otp_code',$this->email_otp_code)
                ->where('is_used',false)
                ->where('mobile_no',$this->mobile_number)
                ->first();

       if(isset($otp->id) && !empty($otp->id)){
        $this->verified_at = now();
        $this->fail_verified = false;
        $this->btn_get_code = false;
        $this->verified_message = true;
        $this->user['email_verified_at'] = $this->verified_at;
        $otp->update(['is_used'=>true]);
       }else{
        $this->verified_message = false;
        $this->btn_get_code = true;
        $this->fail_verified = true;
       }

    }

    public function submitFormRegistration()
    {
        $this->validate();
        User::create($this->user);
        session()->flash('success_message', 'User has been register successfully.');
        return $this->redirect(route('login'));
    }
}
