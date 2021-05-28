<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationLevel::create(['name'=>'No Formal Education']);
        EducationLevel::create(['name'=>'Primary']);
        EducationLevel::create(['name'=>'Middle']);
        EducationLevel::create(['name'=>'Matric']);
        EducationLevel::create(['name'=>'Intermediate']);
        EducationLevel::create(['name'=>'Graduate']);
        EducationLevel::create(['name'=>'Post Graduate']);
    }
}
