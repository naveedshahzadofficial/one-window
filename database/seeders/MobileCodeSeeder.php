<?php

namespace Database\Seeders;

use App\Models\MobileCode;
use Illuminate\Database\Seeder;

class MobileCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mobilink
        for ($i=300;$i<=309;$i++) {
            MobileCode::create(['code_number' => '0'.$i, 'telecom_company_id' => 1]);
        }
        // Telenor
        for ($i=340;$i<=349;$i++) {
            MobileCode::create(['code_number' => '0'.$i, 'telecom_company_id' => 2]);
        }
        // Ufone
        for ($i=330;$i<=339;$i++) {
            MobileCode::create(['code_number' => '0'.$i, 'telecom_company_id' => 3]);
        }
        // Warid
        for ($i=320;$i<=329;$i++) {
            MobileCode::create(['code_number' => '0'.$i, 'telecom_company_id' => 4]);
        }
        // Zong
        for ($i=310;$i<=319;$i++) {
            MobileCode::create(['code_number' => '0'.$i, 'telecom_company_id' => 5]);
        }
    }
}
