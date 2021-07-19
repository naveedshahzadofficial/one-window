<?php

namespace Tests\Feature;

use App\Http\Livewire\Registration;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Models\OtpCode;
use App\Models\Prefix;
use App\Models\TelecomCompany;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        //$this->seed();
        Artisan::call('migrate:fresh --seed');
    }

    /** @test */
    public function register_page_livewire_component()
    {
        $this->get(route('register'))->assertSeeLivewire('registration');
    }

    /** @test */
    public function can_registrations()
    {
        // check with empty validation field
        Livewire::test(Registration::class)
            ->set('user.telecom_company_id', '')
            ->set('user.mobile_no', '')
            ->set('user.mobile_no_confirmation', '')
            ->set('user.email', '')
            ->set('user.email_confirmation', '')
            ->call('submitRegistration')
            ->assertHasErrors(['user.telecom_company_id' => 'required'])
            ->assertHasErrors(['user.mobile_no' => 'required'])
            ->assertHasErrors(['user.email' => 'required']);

        // check confirmation validation filed
        Livewire::test(Registration::class)
            ->set('user.telecom_company_id', '1')
            ->set('user.mobile_no', '0300-4277528')
            ->set('user.mobile_no_confirmation', '')
            ->set('user.email', 'smerp@gmail.com')
            ->set('user.email_confirmation', '')
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.telecom_company_id'])
            ->assertHasNoErrors(['user.mobile_no' => 'required'])
            ->assertHasNoErrors(['user.email' => 'required'])
            ->assertHasErrors(['user.mobile_no' => 'confirmed'])
            ->assertHasErrors(['user.email' => 'confirmed']);

        // check unique validation filed
        Livewire::test(Registration::class)
            ->set('user.telecom_company_id', '1')
            ->set('user.mobile_no', '0300-4277528')
            ->set('user.mobile_no_confirmation', '0300-4277528')
            ->set('user.email', 'smerp@gmail.com')
            ->set('user.email_confirmation', 'smerp@gmail.com')
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.telecom_company_id'])
            ->assertHasNoErrors(['user.mobile_no' => 'required'])
            ->assertHasNoErrors(['user.email' => 'required'])
            ->assertHasErrors(['user.mobile_no' => 'unique'])
            ->assertHasErrors(['user.email' => 'unique']);

       $tel_comp = TelecomCompany::where('company_status',1)->first();
       $this->assertEquals(1, $tel_comp->id);

       $this->assertFalse(OtpCode::where('is_used',false)->exists());
       // check all fields correct enter

       $response = Livewire::test(Registration::class)
            ->assertSet('step', 0)
            ->set('user.telecom_company_id', $tel_comp->id)
            ->assertSet('user.telecom_company_id', 1)
            ->set('user.mobile_no', '0312-4277528')
            ->set('user.mobile_no_confirmation', '0312-4277528')
            ->set('user.email', 'lhrciit2@gmail.com')
            ->set('user.email_confirmation', 'lhrciit2@gmail.com')
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.telecom_company_id','user.mobile_no','user.email'])
            ->assertSet('mobile_number', '0312-4277528')
            ->assertSet('step', 1);

       // new otp code is exists
        $this->assertTrue(OtpCode::where('is_used',false)->exists());

        $this->can_verification_otp($response);
    }

    public function can_verification_otp($response)
    {
        // before send otp...
        $this->assertNotEmpty($response);


        // Validation Check with Empty Field
        $response
            ->assertSet('step', 1)
            ->set('mobile_otp_code', '')
            ->set('email_otp_code' , '')
            ->call('submitRegistration')
            ->assertHasErrors(['mobile_otp_code' => 'required'])
            ->assertHasErrors(['email_otp_code' => 'required']);

        // Wrong OTP
        $response
            ->assertSet('step', 1)
            ->set('mobile_otp_code', '242343')
            ->set('email_otp_code' , '243343')
            ->call('submitRegistration')
            ->assertHasNoErrors(['mobile_otp_code' => 'required'])
            ->assertHasNoErrors(['email_otp_code' => 'required'])
            ->assertSet('fail_verified', true);

        // we have otp code
       $this->assertTrue(OtpCode::where('is_used',false)->exists());


        $otp = OtpCode::where('is_used',false)->first();

        // Correct OTP
        $response
            ->assertSet('step', 1)
            ->set('mobile_otp_code', $otp->mobile_otp_code)
            ->set('email_otp_code', $otp->email_otp_code)
            ->call('submitRegistration')
            ->assertHasNoErrors(['mobile_otp_code' => 'required'])
            ->assertHasNoErrors(['email_otp_code' => 'required'])
            ->assertSet('fail_verified', false)
            ->assertSet('step', 2);

            $this->assertTrue(OtpCode::where('is_used',true)->exists());
            $this->can_registration_submit($response);
    }

    public function can_registration_submit($response)
    {
        $this->assertNotEmpty($response);

        $prefix = Prefix::where('prefix_status',1)->first();

        // Validation Check with Empty Field
        $response
            ->assertSet('step', 2)
            ->set('user.prefix_id', '')
            ->set('user.first_name', "")
            ->set('user.middle_name', null)
            ->set('user.last_name', "")
            ->set('user.cnic_no', "")
            ->set('user.password', "")
            ->set('user.password_confirmation', '')
            ->set('user.declaration', "")
            ->call('submitRegistration')
            ->assertHasErrors(['user.prefix_id' => 'required'])
            ->assertHasErrors(['user.first_name' => 'required'])
            ->assertHasErrors(['user.middle_name' => 'string'])
            ->assertHasErrors(['user.last_name' => 'required'])
            ->assertHasErrors(['user.cnic_no' => 'required'])
            ->assertHasErrors(['user.password' => 'required'])
            ->assertHasErrors(['user.declaration' => 'required']);

        // check confirmation validation filed
        $response
            ->assertSet('step', 2)
            ->set('user.password', "12346789")
            ->set('user.password_confirmation', "12346789")
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.password' => 'confirmed']);

        // check unique validation filed
        $response
            ->assertSet('step', 2)
            ->set('user.cnic_no', "35102-3300406-8")
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.cnic_no' => 'unique']);

        // check all fields correct enter
        $response
            ->assertSet('step', 2)
            ->assertSet('user.telecom_company_id',1)
            ->assertSet('user.mobile_no','0312-4277528')
            ->assertSet('user.email', 'lhrciit2@gmail.com')
            ->set('user.prefix_id', $prefix->id)
            ->set('user.first_name', "Naveed")
            ->set('user.middle_name', "")
            ->set('user.last_name', "Shahzad")
            ->set('user.cnic_no', "35102-3300406-8")
            ->set('user.password', "12346789")
            ->set('user.password_confirmation', "12346789")
            ->set('user.declaration', "1")
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.prefix_id','user.first_name','user.middle_name','user.last_name','user.cnic_no','user.password','user.declaration']);

       $this->assertTrue(User::where('email',"lhrciit2@gmail.com")->exists());
       $response->assertSessionHas('success_message');
       $response->assertRedirect(route('login'))
            ->assertStatus(200);
    }


}
