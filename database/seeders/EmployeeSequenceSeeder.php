<?php

namespace Database\Seeders;

use App\Models\EmployeeSequence;
use Illuminate\Database\Seeder;

class EmployeeSequenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeSequence::create(['sequence_name'=>'0']);
        EmployeeSequence::create(['sequence_name'=>'1-4']);
        EmployeeSequence::create(['sequence_name'=>'5-9']);
        EmployeeSequence::create(['sequence_name'=>'10-19']);
        EmployeeSequence::create(['sequence_name'=>'20-29']);
        EmployeeSequence::create(['sequence_name'=>'30-39']);
        EmployeeSequence::create(['sequence_name'=>'40-49']);

    }
}
