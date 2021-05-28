<?php

namespace Database\Seeders;

use App\Models\MinorityStatus;
use Illuminate\Database\Seeder;

class MinorityStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MinorityStatus::create(['name'=>'Christian']);
        MinorityStatus::create(['name'=>'Sikh']);
        MinorityStatus::create(['name'=>'Hindu']);
        MinorityStatus::create(['name'=>'Ahmadi']);
        MinorityStatus::create(['name'=>'Buddhist']);
        MinorityStatus::create(['name'=>'Jain']);
        MinorityStatus::create(['name'=>"Baha'I"]);
        MinorityStatus::create(['name'=>"Parsi"]);
        MinorityStatus::create(['name'=>"Other"]);
    }
}
