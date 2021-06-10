<?php
namespace App\Services;
use App\Models\Application;
use App\Models\BusinessCategory;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

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

        $province_counts = Application::select('business_province_id', DB::raw('count(*) as total'))->groupBy('business_province_id')->get();
        $district_counts = Application::select('business_district_id', DB::raw('count(*) as total'))->groupBy('business_district_id')->get();
        $category_counts = Application::select('business_province_id','business_district_id','business_category_id', DB::raw('count(*) as total'))->groupBy('business_province_id','business_district_id','business_category_id')->get();
        $provinces = Province::where('province_status',1)->get();
        $districts = District::where('district_status',1)->get();
        $business_categories =  BusinessCategory::where('category_status',1)->get();

        foreach ($provinces as $province){
            $province_count = $province_counts->where('business_province_id',$province->id)->first()->total??0;
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
                array_push($drilldown_series,$this->districtWiseData($province,$districts,$district_counts));
                foreach ($districts as $district){
                    $district_count = $district_counts->where('business_district_id',$district->id)->first()->total??0;
                    if($district_count)
                    array_push($drilldown_series, $this->businessWiseData($province, $district,$business_categories,$category_counts));
                }

            }


        }
        $data['series'] = $series;
        $data['drilldown_series'] = $drilldown_series;
        $data['provinces'] = $provinces;
        return $data;
    }

    private function districtWiseData($province,$districts,$district_counts)
    {

        $obj = new \stdClass;
        $obj->id = 'province_'.$province->id;
        $obj->name = $province->province_name;
        $obj->data = array();

        foreach ($districts as $district){
            $district_count = $district_counts->where('business_district_id',$district->id)->first()->total??0;
            $obj_inner = new \stdClass;
            $obj_inner->name = $district->district_name_e;
            $obj_inner->y = $district_count;
            $obj_inner->url = '';
            if($district_count) {
                $obj_inner->drilldown = 'district_' . $district->id;
            }
            array_push($obj->data,$obj_inner);

        }

        return $obj;
    }

    private function businessWiseData($province, $district,$business_categories,$category_counts)
    {
        $obj = new \stdClass;
        $obj->id = 'district_'.$district->id;
        $obj->name = $district->district_name_e;
        $obj->data = array();
        foreach ($business_categories as $business_category){
            $category_count = $category_counts->where('business_district_id',$district->id)->where('business_category_id',$business_category->id)->first()->total??0;
            $obj_inner = new \stdClass;
            $obj_inner->name = $business_category->category_name;
            $obj_inner->y = $category_count;
            $obj_inner->url = route('admin.applications.index',['province_id'=>$province->id,'district_id'=>$district->id,'business_category_id'=>$business_category->id]);
            array_push($obj->data,$obj_inner);
        }
        return $obj;
    }
}
