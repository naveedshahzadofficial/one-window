<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('db_tables/disabilities__2021-05-27.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
