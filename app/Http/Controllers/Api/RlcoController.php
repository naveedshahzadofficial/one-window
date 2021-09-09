<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Rlco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RlcoController extends Controller
{
    public function departmentList(){
        $departments = Department::select('id',DB::raw('department_name as text'))->where('department_status', 1)->get();
        return response()->json(['departments'=>$departments]);
    }
    public function businessList(){
        $businesses = BusinessCategory::select('id',DB::raw('category_name as text'))->where('category_status', 1)->get();
        return response()->json(['businesses'=>$businesses]);
    }
    public function activityList(){
        $activities = Activity::select('id',DB::raw('activity_name as text'))->where('activity_status', 1)->get();
        return response()->json(['activities'=>$activities]);
    }

    public function searchRlcos(Request $request){
        $paginate = 30;


         $department_id = isset($request->department_id) && !empty($request->department_id) ?$request->department_id: '';
         $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';
         $activity_id = isset($request->activity_id) && !empty($request->activity_id) ?$request->activity_id: '';

         $query = Rlco::select("*")->with('department')->where('rlco_status',1);
         if (!empty($department_id)) {
            $query->where('department_id', $department_id);
        }
        if (!empty($business_category_id)) {
            $query->where('business_category_id', $business_category_id);
        }

        if (!empty($activity_id)) {
            $query->whereHas('activities', function ($q) {
                    $q->where('activity_id', $activity_id);
                });
        }

        $query_count = clone $query;

        $rlcos = $query->paginate($paginate);

        $rlcos_count = $query_count->count();

        return response()->json([
            'rlcos' => $rlcos,
            'rlcos_count' => $rlcos_count,
            'paginate' => $paginate
        ]);
    }
}
