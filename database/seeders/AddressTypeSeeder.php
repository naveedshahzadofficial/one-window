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

        AddressType::create(['type_name'=>'Agriculture Property', 'property_category_id'=>1,'fbr_code_id'=>111]);
        AddressType::create(['type_name'=>'Commercial Property', 'property_category_id'=>1,'fbr_code_id'=>112]);
        AddressType::create(['type_name'=>'Educational Property', 'property_category_id'=>1,'fbr_code_id'=>115]);
        AddressType::create(['type_name'=>'Health Property', 'property_category_id'=>1,'fbr_code_id'=>116]);
        AddressType::create(['type_name'=>'Industrial Property', 'property_category_id'=>1,'fbr_code_id'=>113]);
        AddressType::create(['type_name'=>'Natural Property', 'property_category_id'=>1,'fbr_code_id'=>117]);
        AddressType::create(['type_name'=>'Public Property', 'property_category_id'=>1,'fbr_code_id'=>118]);
        AddressType::create(['type_name'=>'Religious Property', 'property_category_id'=>1,'fbr_code_id'=>119]);
        AddressType::create(['type_name'=>'Residential Property', 'property_category_id'=>1,'fbr_code_id'=>114]);
        AddressType::create(['type_name'=>'Any other', 'property_category_id'=>1,'fbr_code_id'=>null]);
        AddressType::create(['type_name'=>'Agriculture Land', 'property_category_id'=>2,'fbr_code_id'=>null]);
        AddressType::create(['type_name'=>'Building', 'property_category_id'=>2,'fbr_code_id'=>null]);
        AddressType::create(['type_name'=>'House', 'property_category_id'=>2,'fbr_code_id'=>null]);
        AddressType::create(['type_name'=>'Shop', 'property_category_id'=>2,'fbr_code_id'=>null]);
        AddressType::create(['type_name'=>'Any other', 'property_category_id'=>2,'fbr_code_id'=>null]);
    }
}
