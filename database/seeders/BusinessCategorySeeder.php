<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessCategory::create(['category_name'=>'Manufacturing']);
        BusinessCategory::create(['category_name'=>'Trading']);
        BusinessCategory::create(['category_name'=>'Services']);
        BusinessCategory::create(['category_name'=>'Mining and Quarrying']);
        BusinessCategory::create(['category_name'=>'Agriculture']);
        BusinessCategory::create(['category_name'=>'Fisheries and Forestry']);
        BusinessCategory::create(['category_name'=>'Construction']);
    }
}
