<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequiredDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('db_tables/required_documents_2021-08-11.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
