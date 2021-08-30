<?php

namespace Database\Seeders;

use App\Models\BusinessActivity;
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
        BusinessCategory::create(['category_name' => 'Select All', 'category_code'=>'Select All']);

        $business_activities = BusinessActivity::select('section_code','section_name')->where('activity_status',1)->groupBy('section_name','section_code')->get();
        foreach ($business_activities as $activity) {
            BusinessCategory::create(['category_name' => $activity->section_name, 'category_code'=>$activity->section_code]);
        }

    }
}
