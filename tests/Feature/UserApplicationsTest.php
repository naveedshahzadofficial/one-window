<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserApplicationsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
        //Artisan::call('migrate:fresh --seed');
        $this->actingAs(User::factory()->create());
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_new_application()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
