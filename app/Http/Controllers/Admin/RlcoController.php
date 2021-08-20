<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\Rlco;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class RlcoController extends Controller
{

    public function index(): View
    {
        $data = [];
        $data['business_categories'] = BusinessCategory::where('category_status',1)->get();
        return view('admin.rlco.index')->with($data);
    }
    public function indexAjax(Request $request): JsonResponse
    {
        $registration_no = isset($request->registration_no) && !empty($request->registration_no) ?$request->registration_no: '';
        $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';

        $query = Rlco::select("*");
        if (!empty($registration_no)) {
            $query->where('rlco_no', 'like' ,"%$registration_no%");
        }
        if (!empty($business_category_id)) {
            $query->where('business_category_id',  $business_category_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('rlco_status', function (Rlco $rlco){
                return '<span class="btn btn-circle btn-sm border-0 cursor-move active '.($rlco->rlco_status==1?'btn-hover-success':'btn-hover-danger').'">'.$rlco->getRlcoStatus().'</span>';
            })
            ->addColumn('action', function(Rlco $rlco){
                $actionBtn = '<a target="_blank" href="'.route('admin.rlcos.show',$rlco).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                $actionBtn .= '&nbsp;&nbsp;<a  href="'.route('admin.rlcos.edit',$rlco).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['rlco_status','action'])
            ->make(true);
    }

    public function create(): View
    {
        return view('admin.rlco.create');
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

    public function show(Rlco $rlco): View
    {
        $rlco->load('activities','requiredDocuments', 'rlcoKeywords','faqs','foss','dependencies.department');
        return view('admin.rlco.show',compact('rlco'));
    }

    public function edit(Rlco $rlco): View
    {
        $rlco->load('activities','requiredDocuments', 'rlcoKeywords');
        return View('admin.rlco.edit',compact('rlco'));
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
