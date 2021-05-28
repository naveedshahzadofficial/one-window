<?php

namespace Database\Seeders;

use App\Models\BusinessRegistrationStatus;
use Illuminate\Database\Seeder;

class BusinessRegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessRegistrationStatus::create(['name'=>'Registered']);
        BusinessRegistrationStatus::create(['name'=>'Unregistered']);
    }
}
