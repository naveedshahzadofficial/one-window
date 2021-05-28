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
        UtilityType::create(['type_name'=>'Electricity']);
        UtilityType::create(['type_name'=>'Water']);
        UtilityType::create(['type_name'=>'Gas']);

    }
}
