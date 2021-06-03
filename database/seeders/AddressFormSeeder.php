<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $path = public_path('db_tables/address_forms__2021-05-27.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
