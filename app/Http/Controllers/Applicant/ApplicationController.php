<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applicant.application.index');
    }

    public function indexAjax(Request $request)
    {
        $query = Application::query()->where('user_id', auth()->id())->select("*");
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('applicant.applications.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="flaticon-edit"></i></a>&nbsp;<a href="'.route('applicant.applications.show',$row->id).'" class="edit btn btn-primary btn-sm"><i class="flaticon-eye"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicant.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $application =  Application::
        with('designationBusiness', 'minorityStatusQuestion', 'minorityStatus',
       'educationLevel', 'educationLevelQuestion', 'skilledWorkerQuestion',
           'residenceAddressType', 'residenceAddressForm', 'residenceCity', 'residenceDistrict',
       'residenceAddressCapacity',
       'businessRegistrationStatus', 'businessLegalStatus', 'businessCategory', 'businessSector',
       'businessSubSector', 'businessAddressType', 'businessAddressForm', 'businessProvince',
       'businessCity', 'businessDistrict', 'businessTehsil', 'businessCapacity',
           'utilityConnectionQuestion', 'utilityConnections.connectionOwnership','utilityConnections.utilityType','utilityConnections.utilityForm',
           'employeesQuestion')
           ->where('user_id', auth()->id())->find($id);
        if(!$application){
            session()->flash('error_message', 'No Record found.');
            return redirect(route('applicant.applications.index'));
        }
       return view('applicant.application.show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application =  Application::with('utilityConnections','technicalEducations')->where('user_id', auth()->id())->find($id);
        if(!$application){
            session()->flash('error_message', 'No Record found.');
            return redirect(route('applicant.applications.index'));
        }
        return view('applicant.application.edit',compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
