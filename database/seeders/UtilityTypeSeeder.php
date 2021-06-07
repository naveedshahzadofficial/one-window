<?php

namespace Database\Seeders;

use App\Models\UtilityType;
use Illuminate\Database\Seeder;

class UtilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UtilityType::create(['type_name'=>'Commercial']);
        UtilityType::create(['type_name'=>'Industrial']);
        UtilityType::create(['type_name'=>'Residential']);
        UtilityType::create(['type_name'=>'Personal']);

    }
}
