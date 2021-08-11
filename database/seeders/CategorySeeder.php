<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   $sql = "INSERT INTO `categories` (`id`, `category_name`, `category_remark`, `category_status`) VALUES
(1, 'Administrative/ Secretariat Department', '', 1),
(2, 'Attached Department', '', 1),
(3, 'Autonomous Body', '',  1),
(4, 'District Administration', '', 1),
(5, 'Division', '',  1),
(6, 'Local Government', '', 1),
(7, 'Ministry', '', 1),
(8, 'Semi-Autonomous Body', '', 1),
(9, 'Special Institution', '', 1),
(10, 'Test Organization Cat - Bill', 'This is for testing', 0),
(11, '2nd Test Organization Cat - Bill', '', 0)";
        DB::unprepared($sql);
    }
}
