<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Province;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        $data['smes_graph_data'] = $this->smes_graph_data();
        return view('admin.dashboard.index')->with($data);
    }

    private function smes_graph_data()
    {
        $series = array();
        $provinces = Province::where('province_status',1)->get();
        foreach ($provinces as $province){
            $smes_count = Application::where('business_province_id',$province->id)->count();
            $obj = new \stdClass;
            $obj->name = $province->province_name;
            $obj->data = array();
            foreach ($provinces as $prov){
                $obj_inner = new \stdClass;
                $obj_inner->y = ($prov->id==$province->id)?$smes_count:0;
                $obj_inner->url = '';
                array_push($obj->data,$obj_inner);
            }
            array_push($series,$obj);
        }

        $data['series'] = $series;
        $data['provinces'] = $provinces;
        return $data;

    }


}
