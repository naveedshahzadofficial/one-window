<?php

namespace Database\Seeders;

use App\Models\UtilityForm;
use Illuminate\Database\Seeder;

class UtilityFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UtilityForm::create(['form_name'=>'Cell', 'fbr_code_id'=>12001]);
        UtilityForm::create(['form_name'=>'Electricity', 'fbr_code_id'=>12002]);
        UtilityForm::create(['form_name'=>'Gas', 'fbr_code_id'=>12003]);
        UtilityForm::create(['form_name'=>'Internet', 'fbr_code_id'=>12006]);
        UtilityForm::create(['form_name'=>'Tel', 'fbr_code_id'=>12004]);
        UtilityForm::create(['form_name'=>'Water', 'fbr_code_id'=>12005]);

    }
}
