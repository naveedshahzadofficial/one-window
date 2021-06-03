<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Seeder;

class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prefix::create(['prefix_name'=>'Dr', 'fbr_code_id'=>4]);
        Prefix::create(['prefix_name'=>'Mr', 'fbr_code_id'=>1]);
        Prefix::create(['prefix_name'=>'Mrs', 'fbr_code_id'=>2]);
        Prefix::create(['prefix_name'=>'Ms', 'fbr_code_id'=>3]);

    }
}
