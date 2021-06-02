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
        EmployeeType::create(['type_name'=>'Permanent']);
        EmployeeType::create(['type_name'=>'Contractual']);
        EmployeeType::create(['type_name'=>'Daily Wagers (Regular)']);
        EmployeeType::create(['type_name'=>'Daily Wagers (Unregistered)']);
        EmployeeType::create(['type_name'=>'Piece Rate Workers (Regular)']);
        EmployeeType::create(['type_name'=>'Piece Rate Workers (Unregistered)']);

    }
}
