<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\BusinessRegistrationStatus;
use App\Models\District;
use App\Models\Gender;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index(): View
    {
       $data =array();
       $data['provinces'] = Province::where('province_status',1)->get();
       $data['districts'] = District::where('district_status',1)->get();
       $data['registration_status'] = BusinessRegistrationStatus::where('status',1)->get();
       $data['business_categories'] = BusinessCategory::where('category_status',1)->get();

       return view('admin.application.index')->with($data);
    }

   public function indexAjax(Request $request)
    {
        $province_id = isset($request->province_id) && !empty($request->province_id) ?$request->province_id: '';
        $registration_no = isset($request->registration_no) && !empty($request->registration_no) ?$request->registration_no: '';
        $district_id = isset($request->district_id) && !empty($request->district_id) ?$request->district_id: '';
        $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';
        $business_registration_status_id = isset($request->business_registration_status_id) && !empty($request->business_registration_status_id) ?$request->business_registration_status_id: '';

        $query = Application::query()->select("*");
        if (!empty($registration_no)) {
            $query->where('registration_no', 'like' ,"%$registration_no%");
        }
        if (!empty($province_id)) {
            $query->where('business_province_id',  $province_id);
        }
        if (!empty($district_id)) {
            $query->where('business_district_id',  $district_id);
        }
        if (!empty($business_category_id)) {
            $query->where('business_category_id',  $business_category_id);
        }
        if (!empty($business_registration_status_id)) {
            $query->where('business_registration_status_id',  $business_registration_status_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function(Application $application){
                $actionBtn = '<a target="_blank" href="'.route('admin.applications.show',$application).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id): View
    {
        $application =  Application::with('certification')->
        with('prefix', 'gender','designationBusiness', 'minorityStatusQuestion', 'minorityStatus',
       'educationLevel', 'educationLevelQuestion', 'skilledWorkerQuestion',
           'residenceAddressType', 'residenceAddressForm', 'residenceCity', 'residenceDistrict',
       'residenceAddressCapacity',
       'businessRegistrationStatus', 'businessLegalStatus', 'businessActivity', 'businessAddressType', 'businessAddressForm', 'businessProvince',
       'businessCity', 'businessDistrict', 'businessTehsil', 'businessCapacity',
           'utilityConnectionQuestion', 'utilityConnections.connectionOwnership','utilityConnections.utilityType','utilityConnections.utilityForm',
           'employeesQuestion','employeeInfos.employeeType','turnoverFiscalYear', 'exportQuestion','exportFiscalYear', 'exportCurrency','importQuestion','importFiscalYear','importCurrency')->findOrFail($id);;
       $genders = Gender::where('gender_status',1)->get();
       return view('admin.application.show',compact('application','genders'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
