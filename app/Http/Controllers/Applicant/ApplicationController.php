<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Gender;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    public function index(): View
    {
        return view('applicant.application.index');
    }

    public function indexAjax(Request $request)
    {
        $query = Application::query()->where('user_id', auth()->id())->select("*");
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function(Application $application){
                $actionBtn = '<a href="'.route('applicant.applications.edit',$application).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>&nbsp;
                              <a target="_blank" href="'.route('applicant.applications.show',$application).'" class="edit btn btn-custom-color text-center btn-icon btn-circle btn-xs"><i class="flaticon-eye text-white"></i></a>';

                $actionBtn .= '&nbsp;<a href="'.route('applicant.applications.certifications.create',$application).'" class="edit btn btn-custom-color text-center btn-icon btn-circle btn-xs"><i class="flaticon-interface-11 text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create(): View
    {
        return view('applicant.application.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id): View
    {
       $application =  Application::
        with('prefix', 'gender','designationBusiness', 'minorityStatusQuestion', 'minorityStatus',
       'educationLevel', 'educationLevelQuestion', 'skilledWorkerQuestion',
           'residenceAddressType', 'residenceAddressForm', 'residenceCity', 'residenceDistrict',
       'residenceAddressCapacity',
       'businessRegistrationStatus', 'businessLegalStatus', 'businessActivity', 'businessAddressType', 'businessAddressForm', 'businessProvince',
       'businessCity', 'businessDistrict', 'businessTehsil', 'businessCapacity',
           'utilityConnectionQuestion', 'utilityConnections.connectionOwnership','utilityConnections.utilityType','utilityConnections.utilityForm',
           'employeesQuestion','employeeInfos.employeeType','turnoverFiscalYear', 'exportQuestion','exportFiscalYear', 'exportCurrency','importQuestion','importFiscalYear','importCurrency')
           ->where('user_id', auth()->id())->findOrFail($id);
        $genders = Gender::where('gender_status',1)->get();
       return view('applicant.application.show',compact('application','genders'));
    }

    public function edit($id): View
    {
        $application =  Application::with('utilityConnections','technicalEducations','employeeInfos')->where('user_id', auth()->id())->findOrFail($id);
        return view('applicant.application.edit',compact('application'));
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
