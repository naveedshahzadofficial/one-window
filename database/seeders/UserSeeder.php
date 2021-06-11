<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `prefix_id`, `first_name`, `middle_name`, `last_name`, `cnic_no`, `mobile_no`, `telecom_company_id`, `mobile_code_id`, `deleted_at`) VALUES (1, 'smerp@gmail.com', '2021-05-26 08:32:35', '\$2y$10\$uaMWde9MYTOfrSKLWx16H.3dPf2VGOcs8o8j7R3Zac0RsoC6PNe/2', NULL, '2021-05-26 08:33:02', '2021-05-26 08:33:02', 2, 'Muhammad', NULL, 'Khalid', '35102-3300408-1', '0300-4277528', 1, 1, NULL);";
        DB::unprepared($sql);
        $sql = "INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `prefix_id`, `first_name`, `middle_name`, `last_name`, `cnic_no`, `mobile_no`, `telecom_company_id`, `mobile_code_id`, `deleted_at`) VALUES (2, 'admin@gmail.com', '2021-05-26 08:32:35', '\$2y$10\$uaMWde9MYTOfrSKLWx16H.3dPf2VGOcs8o8j7R3Zac0RsoC6PNe/2', NULL, '2021-05-26 08:33:02', '2021-05-26 08:33:02', 2, 'Admin', NULL, 'PITB', '35102-3300408-2', '0300-4277529', 1, 1, NULL);";
        DB::unprepared($sql);
    }
}
