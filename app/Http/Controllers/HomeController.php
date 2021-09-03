<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Rlco;

class HomeController extends Controller
{

    public function index()
    {
        $data = array();
        $data['departments'] = Department::where('department_status',1)->get();
        $data['businesses'] = BusinessCategory::where('category_status',1)->get();
        $data['activities'] = Activity::orderBy('activity_order')->where('activity_status',1)->get();
        return view('frontend.home')->with($data);
    }

    public function search()
    {
        return view('frontend.search_page');
    }

    public function show(Rlco $rlco){
        $rlco->load('activities','requiredDocuments', 'keywords','businessActivities','faqs','foss','dependencies.department', 'otherDocuments');
        return view('frontend.rlco_detail',compact('rlco'));
    }
}
