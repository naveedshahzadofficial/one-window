<?php

namespace Database\Seeders;

use App\Models\AddressType;
use Illuminate\Database\Seeder;

class AddressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddressType::create(['type_name'=>'Home']);
        AddressType::create(['type_name'=>'Business']);
        AddressType::create(['type_name'=>'Billing']);
        AddressType::create(['type_name'=>'Shipping']);
        AddressType::create(['type_name'=>'Contract']);
    }
}
