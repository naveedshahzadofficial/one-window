<?php

namespace Tests\Feature;

use App\Http\Livewire\ApplicationForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $this->actingAs(User::factory()->create());
    }

    /** @test */
    public function createRegistrationSeePage()
    {
        $this->get(route('applicant.registrations.create'))->assertSeeLivewire('application-form');
    }

    /** @test */
    public function applicantProfile()
    {
        Livewire::test(ApplicationForm::class)
            ->assertSee('application.user_id');
    }
}
