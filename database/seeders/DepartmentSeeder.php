<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('db_tables/departments_2021-08-11.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
