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
        AddressCapacity::create(['capacity_name'=>'Benami / Lessee / Tenant / Franchisee / Occupant', 'fbr_code_id'=>14]);
        AddressCapacity::create(['capacity_name'=>'Owner', 'fbr_code_id'=>17]);
        AddressCapacity::create(['capacity_name'=>'Residence / Head Office', 'fbr_code_id'=>24, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Advisor / Attorney / Consultant', 'fbr_code_id'=>1, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Director', 'fbr_code_id'=>7, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Member', 'fbr_code_id'=>15, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Partner', 'fbr_code_id'=>18, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Principal Officer', 'fbr_code_id'=>21, 'capacity_status'=>0]);
        AddressCapacity::create(['capacity_name'=>'Residence / Head Office', 'fbr_code_id'=>24, 'capacity_status'=>0]);

    }
}
