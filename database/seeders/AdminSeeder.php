<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Admin::create([
           'first_name'=>'Admin',
           'last_name'=>'PITB',
           'cnic_no'=>'35102-3300408-1',
           'mobile_no'=>'0300-4277528',
           'email'=>'admin@gmail.com',
           'password'=>bcrypt("123456789"),
           'email_verified_at'=> now()
       ]);
    }
}
