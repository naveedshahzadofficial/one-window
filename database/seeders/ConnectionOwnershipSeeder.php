<?php

namespace Database\Seeders;

use App\Models\ConnectionOwnership;
use Illuminate\Database\Seeder;

class ConnectionOwnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConnectionOwnership::create(['ownership_name'=>'In own Name']);
        ConnectionOwnership::create(['ownership_name'=>'In some other Name']);
    }
}
