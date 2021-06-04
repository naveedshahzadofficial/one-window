<?php

namespace Database\Seeders;

use App\Models\EmployeeType;
use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeType::create(['type_name'=>'Permanent','type_name_u'=>'مستقل']);
        EmployeeType::create(['type_name'=>'Contractual','type_name_u'=>'معاہدہ']);
        EmployeeType::create(['type_name'=>'Daily Wagers (Regular)','type_name_u'=>'ڈیلی ویجرز (باقاعدہ)']);
        EmployeeType::create(['type_name'=>'Daily Wagers (Unregistered)','type_name_u'=>'ڈیلی ویجرز (غیر رجسٹرڈ)']);
        EmployeeType::create(['type_name'=>'Piece Rate Workers (Regular)','type_name_u'=>'فی آئٹم کارکن (باقاعدہ)']);
        EmployeeType::create(['type_name'=>'Piece Rate Workers (Unregistered)','type_name_u'=>'فی آئٹم کارکن (غیر رجسٹرڈ)']);

    }
}
