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

    private $provinces;
    private $districts;
    private $business_categories;
    private $category_counts;

    private $series;
    private $drilldown_series;
    /**
     * GraphService constructor.
     */
    public function __construct()
    {
        $this->category_counts = Application::select('business_province_id','business_district_id','business_category_id', DB::raw('count(*) as total'))->groupBy('business_province_id','business_district_id','business_category_id')->get();
        $this->provinces = Province::withCount('applications')->orderBy('applications_count', 'desc')->where('province_status',1)->get();
        $this->districts = District::withCount('applications')->orderBy('applications_count', 'desc')->where('district_status',1)->get();
        $this->business_categories =  BusinessCategory::where('category_status',1)->get();

        $this->series = array();
        $this->drilldown_series = array();
    }

    public function provinceWiseData()
    {

        foreach ($this->provinces as $province){
            $obj = new \stdClass;
            $obj->name = $province->province_name;
            //$obj->colorByPoint = true;
            $obj->data = array();
            $obj_inner = new \stdClass;
            $obj_inner->name = $province->province_name;
            $obj_inner->y = $province->applications_count;
            $obj_inner->url = '';
            if($province->applications_count) {
                $obj_inner->drilldown = 'province_' . $province->id;
                $this->districtWiseData($province);
            }

            array_push($obj->data,$obj_inner);
            array_push($this->series,$obj);

        }
        $data['series'] = $this->series;
        $data['drilldown_series'] = $this->drilldown_series;
        return $data;
    }

    private function districtWiseData($province)
    {

        $obj = new \stdClass;
        $obj->id = 'province_'.$province->id;
        $obj->name = $province->province_name;
        $obj->data = array();

        foreach ($this->districts as $district){
            if($district->province_id!=$province->id)
                continue;

            $obj_inner = new \stdClass;
            $obj_inner->name = $district->district_name_e;
            $obj_inner->y = $district->applications_count;
            $obj_inner->url = '';

            if($district->applications_count) {
                $obj_inner->drilldown = 'district_' . $district->id;
                $this->businessWiseData($province, $district);
            }
            array_push($obj->data,$obj_inner);
        }

        array_push($this->drilldown_series,$obj);
    }

    private function businessWiseData($province, $district)
    {
        $obj = new \stdClass;
        $obj->id = 'district_'.$district->id;
        $obj->name = $district->district_name_e;
        $obj->data = array();
        foreach ($this->business_categories as $business_category){
            $category_count = $this->category_counts->where('business_district_id',$district->id)->where('business_category_id',$business_category->id)->first()->total??0;
            $obj_inner = new \stdClass;
            $obj_inner->name = $business_category->category_name;
            $obj_inner->y = $category_count;
            $obj_inner->url = route('admin.applications.index',['province_id'=>$province->id,'district_id'=>$district->id,'business_category_id'=>$business_category->id]);
            array_push($obj->data,$obj_inner);
        }
        array_push($this->drilldown_series,$obj);
    }
}
