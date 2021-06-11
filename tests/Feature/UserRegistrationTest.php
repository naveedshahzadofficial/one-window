<?php

namespace Tests\Feature;

use App\Http\Livewire\Registration;
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

       $tel_comp = TelecomCompany::where('company_status',1)->first();
       $this->assertEquals(1, $tel_comp->id);

       $this->assertDatabaseCount('otp_codes',0);

        Livewire::test(Registration::class)
            ->set('user.telecom_company_id', $tel_comp->id)
            ->assertSet('user.telecom_company_id', 1)
            ->set('user.mobile_no', '0300-4277528')
            ->assertSet('user.mobile_no', '0300-4277528')
            ->set('user.mobile_no_confirmation', '0300-4277528')
            ->assertSet('user.mobile_no_confirmation', '0300-4277528')
            ->set('user.email', 'lhrciit@gmail.com')
            ->assertSet('user.email', 'lhrciit@gmail.com')
            ->set('user.email_confirmation', 'lhrciit@gmail.com')
            ->assertSet('user.email_confirmation', 'lhrciit@gmail.com')
            ->call('submitRegistration');

        $this->assertDatabaseCount('otp_codes',1);
           //$otp = OtpCode::where('email','lhrciit@gmail.com')->first();
           //$this->assertEquals(1, $otp->id);

            //$this->assertTrue(OtpCode::whereEmail('lhrciit@gmail.com')->exists());
    }


}
