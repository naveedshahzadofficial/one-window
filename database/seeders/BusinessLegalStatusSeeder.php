<?php

namespace Database\Seeders;

use App\Models\BusinessLegalStatus;
use Illuminate\Database\Seeder;

class BusinessLegalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessLegalStatus::create(['legal_name'=>'Sole Proprietor/Owner']);
        BusinessLegalStatus::create(['legal_name'=>'Partnership Firm']);
        BusinessLegalStatus::create(['legal_name'=>'Single Member Company']);
        BusinessLegalStatus::create(['legal_name'=>'Private Limited']);
        BusinessLegalStatus::create(['legal_name'=>'Public Limited']);
    }
}
