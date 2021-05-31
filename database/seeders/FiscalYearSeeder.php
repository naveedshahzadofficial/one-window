<?php

namespace Database\Seeders;

use App\Models\FiscalYear;
use Illuminate\Database\Seeder;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FiscalYear::create(['year_name'=>'2019 - 2020']);
        FiscalYear::create(['year_name'=>'2020 - 2021']);
    }
}
