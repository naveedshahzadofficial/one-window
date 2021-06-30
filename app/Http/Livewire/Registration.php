<?php

namespace App\Http\Livewire;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Models\MobileCode;
use App\Models\OtpCode;
use App\Models\Prefix;
use App\Models\User;
use App\Models\TelecomCompany;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Registration extends Component
{
    public $step;
    private $stepActions = [
        'submitOTPSend',
        'submitOTPVerification',
        'submitFormRegistration'
    ];

    public $prefixes;
    public $telecom_companies;
    public $user;
    public $mobile_otp_code;
    public $email_otp_code;
    public $mobile_number;
    public $verified_at = null;
    public $fail_verified = false;

    protected $rules = [
        'user.prefix_id' => 'required',
        'user.first_name' => 'required|string',
        'user.middle_name' => 'string',
        'user.last_name' => 'required|string',
        'user.declaration' => 'required',
        'user.cnic_no' => 'required|unique:users,cnic_no',
        'user.password' => 'required|string|min:8|confirmed',
    ];

    protected $messages = [
        'user.prefix_id.required' => 'Prefix is required.',
        'user.first_name.required' => 'First Name is required.',
        'user.last_name.required' => 'Last Name is required.',
        'user.declaration.required' => 'Declaration is required.',
        'user.cnic_no.required' => 'CNIC No. is is required.',
        'user.cnic_no.unique' => 'CNIC No. is already register.',
        'user.password.required' => 'Password is required.',
        'user.password.min' => 'The Password must be at least 8 characters.',
        'user.password.confirmed' => 'Password must be same as confirm password.',
    ];

    public function mount()
    {
        $this->step = 0;

        $this->prefixes = Prefix::where('prefix_status',1)->get();
        $this->telecom_companies = TelecomCompany::where('company_status',1)->get();
    }


    public function render()
    {
        return view('livewire.registration');
    }

    public function submitRegistration()
    {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function submitOTPSend(){

        $otp_send_rules = [
            'user.telecom_company_id' => 'required',
            'user.mobile_no' => 'required|unique:users,mobile_no|confirmed',
            'user.email' => 'required|string|email|unique:users,email|confirmed',
        ];
        $otp_send_messages = [
            'user.telecom_company_id.required' => 'Company is required.',
            'user.mobile_no.required' => 'Mobile No. is required.',
            'user.mobile_no.unique' => 'Mobile No. is already register.',
            'user.mobile_no.confirmed' => 'Mobile No. must be same as confirm mobile no.',
            'user.email.required' => 'Email is required.',
            'user.email.email' => 'Email format is not valid.',
            'user.email.unique' => 'Email is already register.',
            'user.email.confirmed' => 'Email must be same as confirm email.',
        ];
        $this->validate($otp_send_rules, $otp_send_messages);

        $this->mobile_number = $this->user['mobile_no'];

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
            'ip_address'=> Request::ip()??null,
        ]);

        SendSmsJob::dispatch($this->mobile_number, $message_sms);
        SendEmailJob::dispatch($this->user['email'],$data,'Registration');


        $this->step++;
    }

    public function submitOTPVerification(){

        $otp_verify_rules = [
            'mobile_otp_code' => 'required',
            'email_otp_code' => 'required'
        ];

        $otp_verify_messages = [
            'mobile_otp_code.required' => 'Mobile Verification Code is required.',
            'email_otp_code.required' => 'Email Verification Code is required.',
        ];

        $this->validate($otp_verify_rules, $otp_verify_messages);
        $email = isset($this->user['email'])?$this->user['email']:null;

        $otp = OtpCode::where('mobile_otp_code',$this->mobile_otp_code)
            ->where('email_otp_code',$this->email_otp_code)
            ->where('is_used',false)
            ->where('mobile_no',$this->mobile_number)
            ->where('email',$email)
            ->latest()
            ->first();

        if(isset($otp->id) && !empty($otp->id)){
            $this->user['email_verified_at'] = $this->verified_at;
            $otp->update(['is_used'=>true]);
            $this->fail_verified = false;
            $this->step++;
        }else{
            $this->fail_verified = true;
        }
    }


    public function submitFormRegistration()
    {
        $this->validate();
        $this->user['password'] = bcrypt($this->user['password']);
        User::create($this->user);

        $data = new \stdClass;
        $data->subject = "SMERP Registration";
        $data->name = $this->user['first_name'];
        $data->body = "You are successful sign up, now you can registration your SMEs.";
        SendEmailJob::dispatch($this->user['email'],$data,'default');


        session()->flash('success_message', 'User has been register successfully.');
        return $this->redirect(route('login'));
    }

    public function decreaseStep()
    {
        if($this->step>0)
            $this->step--;
        $this->pageChangeDispatch();
    }

    private function pageChangeDispatch(){
        $this->dispatchBrowserEvent('page:tab',['change'=>true]);
    }

}
