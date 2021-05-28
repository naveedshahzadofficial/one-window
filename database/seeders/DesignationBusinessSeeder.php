<?php

namespace Database\Seeders;

use App\Models\DesignationBusiness;
use Illuminate\Database\Seeder;

class DesignationBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DesignationBusiness::create(['name'=>'Sole Proprietor']);
        DesignationBusiness::create(['name'=>'Majority Shareholder']);
        DesignationBusiness::create(['name'=>'Shareholder']);
        DesignationBusiness::create(['name'=>'Director']);
        DesignationBusiness::create(['name'=>'Chief Executive']);
    }
}
