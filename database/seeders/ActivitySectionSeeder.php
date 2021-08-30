<?php

namespace Database\Seeders;

use App\Models\BusinessActivity;
use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_categories = BusinessCategory::all();
        foreach ($business_categories as $category){
            DB::table('business_activities')->where('section_name',$category->category_name)
                ->lazyById()->each(function ($activity) use($category) {
                    DB::table('business_activities')
                        ->where('id', $activity->id)
                        ->update(['business_category_id'=>$category->id]);
                });
        }
    }
}
