<?php
namespace App\Services;
use App\Models\Application;
use App\Models\BusinessCategory;
use App\Models\District;
use App\Models\Province;

/**
 * Created by Naveed Shahzad.
 * User: naveed
 * Date: 10/06/2021
 * Time: 08:06 PM
 */
class GraphService{

    public function provinceWiseData()
    {
        $series = array();
        $drilldown_series = array();
        $provinces = Province::where('province_status',1)->get();
        foreach ($provinces as $province){
            $province_count = Application::where('business_province_id',$province->id)->count();
            $obj = new \stdClass;
            $obj->name = $province->province_name;
            //$obj->colorByPoint = true;
            $obj->data = array();
            $obj_inner = new \stdClass;
            $obj_inner->name = $province->province_name;
            $obj_inner->y = $province_count;
            $obj_inner->url = '';
            if($province_count)
                $obj_inner->drilldown = 'province_'.$province->id;
            array_push($obj->data,$obj_inner);
            array_push($series,$obj);

            /* District */
            if($province_count) {
                $districts = District::where('province_id',$province->id)->where('district_status',1)->get();
                array_push($drilldown_series, $this->districtWiseData($province, $districts));
                foreach ($districts as $district){
                    array_push($drilldown_series, $this->businessWiseData($province, $district));
                }
            }


        }
        $data['series'] = $series;
        $data['drilldown_series'] = $drilldown_series;
        $data['provinces'] = $provinces;
        return $data;
    }

    private function districtWiseData($province,$districts)
    {

        $obj = new \stdClass;
        $obj->id = 'province_'.$province->id;
        $obj->name = $province->province_name;
        $obj->data = array();

        foreach ($districts as $district){
            $district_count = Application::where('business_district_id',$district->id)->count();
            $obj_inner = new \stdClass;
            $obj_inner->name = $district->district_name_e;
            $obj_inner->y = $district_count;
            $obj_inner->url = '';
            if($district_count)
                $obj_inner->drilldown = 'district_'.$district->id;
            array_push($obj->data,$obj_inner);
        }
        return $obj;
    }

    private function businessWiseData($province, $district)
    {
        $business_categories =  BusinessCategory::where('category_status',1)->get();
        $obj = new \stdClass;
        $obj->id = 'district_'.$district->id;
        $obj->name = $district->district_name_e;
        $obj->data = array();
        foreach ($business_categories as $business_category){
            $category_count = Application::where('business_province_id',$province->id)
                ->where('business_district_id',$district->id)->where('business_category_id',$business_category->id)->count();
            $obj_inner = new \stdClass;
            $obj_inner->name = $business_category->category_name;
            $obj_inner->y = $category_count;
            $obj_inner->url = route('admin.applications.index',['province_id'=>$province->id,'district_id'=>$district->id,'business_category_id'=>$business_category->id]);
            array_push($obj->data,$obj_inner);
        }
        return $obj;
    }
}
