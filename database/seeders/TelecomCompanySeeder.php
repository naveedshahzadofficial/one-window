<?php

namespace Database\Seeders;

use App\Models\TelecomCompany;
use Illuminate\Database\Seeder;

class TelecomCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TelecomCompany::create(['company_name'=>'Mobilink']);
        TelecomCompany::create(['company_name'=>'Telenor']);
        TelecomCompany::create(['company_name'=>'Ufone']);
        TelecomCompany::create(['company_name'=>'Warid']);
        TelecomCompany::create(['company_name'=>'Zong']);
    }
}
