<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(['gender_name'=>'Male', 'fbr_code_id'=>1]);
        Gender::create(['gender_name'=>'Female', 'fbr_code_id'=>2]);
        Gender::create(['gender_name'=>'Transgender', 'fbr_code_id'=>3]);
    }
}
