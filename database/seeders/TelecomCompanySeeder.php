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
        TelecomCompany::create(['company_name'=>'Mobilink', 'fbr_code_id'=>501]);
        TelecomCompany::create(['company_name'=>'Telenor', 'fbr_code_id'=>502]);
        TelecomCompany::create(['company_name'=>'Ufone', 'fbr_code_id'=>503]);
        TelecomCompany::create(['company_name'=>'Warid', 'fbr_code_id'=>504]);
        TelecomCompany::create(['company_name'=>'Zong', 'fbr_code_id'=>505]);
    }
}
