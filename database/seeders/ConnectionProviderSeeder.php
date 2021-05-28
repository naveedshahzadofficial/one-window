<?php

namespace Database\Seeders;

use App\Models\ConnectionProvider;
use Illuminate\Database\Seeder;

class ConnectionProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConnectionProvider::create(['provider_name'=>'FESCO']);
        ConnectionProvider::create(['provider_name'=>'GEPCO']);
        ConnectionProvider::create(['provider_name'=>'HESCO']);
        ConnectionProvider::create(['provider_name'=>'SEPCO']);
        ConnectionProvider::create(['provider_name'=>'IESCO']);
        ConnectionProvider::create(['provider_name'=>'KESC']);
        ConnectionProvider::create(['provider_name'=>'LESCO']);
        ConnectionProvider::create(['provider_name'=>'MEPCO']);
        ConnectionProvider::create(['provider_name'=>'PESCO']);
        ConnectionProvider::create(['provider_name'=>'QESCO']);
        ConnectionProvider::create(['provider_name'=>'TESCO']);
    }
}
