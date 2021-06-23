<?php

namespace Tests\Feature;

use App\Http\Livewire\Registration;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Models\OtpCode;
use App\Models\TelecomCompany;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        //$this->seed();
        Artisan::call('migrate:fresh --seed');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_page_livewire_component()
    {
        $this->get(route('register'))->assertSeeLivewire('registration');
    }

    public function test_can_register_send_otp()
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

       $this->assertDatabaseCount('otp_codes',0);

       $response = Livewire::test(Registration::class)
            ->assertSet('step', 0)
            ->set('user.telecom_company_id', $tel_comp->id)
            ->assertSet('user.telecom_company_id', 1)
            ->set('user.mobile_no', '0300-4277510')
            ->set('user.mobile_no_confirmation', '0300-4277510')
            ->set('user.email', 'lhrciit2@gmail.com')
            ->set('user.email_confirmation', 'lhrciit2@gmail.com')
            ->call('submitRegistration')
            ->assertHasNoErrors(['user.telecom_company_id','user.mobile_no','user.email'])
            ->assertSet('mobile_number', '0300-4277510')
            ->assertSet('step', 1);

         //$this->expectsJobs(SendSmsJob::class);
         //$this->expectsJobs(SendEmailJob::class);
         $this->assertDatabaseCount('otp_codes',1);

           //$otp = OtpCode::where('email','lhrciit@gmail.com')->first();
           //$this->assertEquals(1, $otp->id);

            //$this->assertTrue(OtpCode::whereEmail('lhrciit@gmail.com')->exists());

        return $response;
    }

    public function test_can_verification_otp()
    {
        // before send otp...
        $response = $this->test_can_register_send_otp();

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

    }

    public function test_can_registration()
    {

    }


}
