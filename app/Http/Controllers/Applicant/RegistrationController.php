<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Gender;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('applicant.registration.index');
    }

    public function indexAjax(Request $request)
    {
        $query = Registration::with('application','status')->where('user_id', auth()->id())->select("*");
        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status_id', function (Registration $registration){
                return '<span class="btn btn-circle btn-sm border-0  active '.optional($registration->status)->status_color_class.'">'.optional($registration->status)->status_name.'</span>';
            })
            ->addColumn('action', function(Registration $registration){
                $actionBtn = '<a href="'.route('applicant.registrations.edit',$registration).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>&nbsp;
                              <a target="_blank" href="'.route('applicant.registrations.show',$registration).'" class="edit btn btn-custom-color text-center btn-icon btn-circle btn-xs"><i class="flaticon-eye text-white"></i></a>';
                if(!optional($registration->application)->id)
                $actionBtn .= '&nbsp;<a href="'.route('applicant.registrations.applications.create',$registration).'" class="edit btn btn-custom-color text-center btn-icon btn-circle btn-xs"><i class="flaticon-interface-11 text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['status_id','action'])
            ->make(true);
    }

    public function create(): View
    {
        return view('applicant.registration.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id): View
    {
       $registration =  Registration::
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
       return view('applicant.registration.show',compact('registration','genders'));
    }

    public function edit($id): View
    {
        $registration =  Registration::with('utilityConnections','technicalEducations','employeeInfos')->where('user_id', auth()->id())->findOrFail($id);
        return view('applicant.registration.edit',compact('registration'));
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
