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
        UtilityType::create(['type_name'=>'Commercial Utility']);
        UtilityType::create(['type_name'=>'Industrial Utility']);
        UtilityType::create(['type_name'=>'Personal Utility']);
        UtilityType::create(['type_name'=>'Residential Utility']);

    }
}
