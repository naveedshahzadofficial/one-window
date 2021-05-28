<?php

namespace Database\Seeders;

use App\Models\AddressShare;
use Illuminate\Database\Seeder;

class AddressShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=100;$i++)
        AddressShare::create(['share_name'=>$i]);
    }
}
