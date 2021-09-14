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
        $departments = Department::select('id',DB::raw('department_name as text'))->where('department_status', 1)->whereHas('rlcos', function ($q){ $q->where('rlco_status',1);})->get();
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

         $department_id = isset($request->department_id) && !empty($request->department_id) ?$request->department_id: '';
         $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';
         $activity_id = isset($request->activity_id) && !empty($request->activity_id) ?$request->activity_id: '';

         /* Activities with count of RLCOs */
        $query = Activity::with(['rlcos'=>function($q) use($department_id,$business_category_id){
            if (!empty($department_id)) {
                $q->where('department_id', $department_id);
            }
            if (!empty($business_category_id)) {
                $q->where('business_category_id', $business_category_id);
            }
            return $q->where('rlco_status',1)->with('businessCategory','department','inspectionDepartment','requiredDocuments','faqs','foss','dependencies.department', 'otherDocuments');
            }])
            ->withCount(['rlcos'=>function($q) use($department_id,$business_category_id){
                if (!empty($department_id)) {
                    $q->where('department_id', $department_id);
                }
                if (!empty($business_category_id)) {
                    $q->where('business_category_id', $business_category_id);
                }
                $q->where('rlco_status',1);
            }])
            ->having('rlcos_count', '>', 0)->where('activity_status',1);

        if (!empty($business_category_id)) {
            $query->whereHas('rlcos', function ($q) use($business_category_id) {
                $q->where('business_category_id', $business_category_id);
            });
        }

        if (!empty($activity_id)) {
            $query->where('id', $activity_id);
        }
        if (!empty($department_id)) {
            $query->whereHas('rlcos', function ($q) use($department_id) {
                $q->where('department_id', $department_id);
            });
        }

        $activities = $query->get();

        $rlcos = array();
        foreach ($activities as $activity){
            foreach ($activity->rlcos as $rlco){
                $rlco->activity_id = $activity->id;
                array_push($rlcos, $rlco);
            }
        }
        $total_rlcos = $activities->sum('rlcos_count');

        return response()->json([
            'activities' => $activities,
            'rlcos' => $rlcos,
            'total_rlcos' => $total_rlcos,
        ]);
    }

    public function rlcoDetail(Rlco $rlco){
        $rlco->load('department', 'activities','requiredDocuments', 'keywords','businessActivities','faqs','foss','dependencies.department', 'otherDocuments');
        return response()->json(['rlco'=>$rlco]);
    }
}
