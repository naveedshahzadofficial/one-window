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
        Gender::create(['gender_name'=>'Male', 'gender_name_u'=>'مرد', 'fbr_code_id'=>1]);
        Gender::create(['gender_name'=>'Female', 'gender_name_u'=>'عورت', 'fbr_code_id'=>2]);
        Gender::create(['gender_name'=>'Transgender', 'gender_name_u'=>'خواجہ سِرا', 'fbr_code_id'=>3]);
    }
}
