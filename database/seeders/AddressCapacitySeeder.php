<?php

namespace Database\Seeders;

use App\Models\AddressCapacity;
use Illuminate\Database\Seeder;

class AddressCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddressCapacity::create(['capacity_name'=>'Capacity 1']);
        AddressCapacity::create(['capacity_name'=>'Capacity 2']);

    }
}
