<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\Department;
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
        $data['departments'] = Department::where('department_status',1)->get();
        return view('admin.rlco.index')->with($data);
    }
    public function indexAjax(Request $request): JsonResponse
    {
        $department_id = isset($request->department_id) && !empty($request->department_id) ?$request->department_id: '';
        $registration_no = isset($request->registration_no) && !empty($request->registration_no) ?$request->registration_no: '';
        $business_category_id = isset($request->business_category_id) && !empty($request->business_category_id) ?$request->business_category_id: '';

        $query = Rlco::select("*")->with('department');
        if (!empty($registration_no)) {
            $query->where('rlco_no', 'like' ,"%$registration_no%");
        }
        if (!empty($department_id)) {
            $query->where('department_id', $department_id);
        }
        if (!empty($business_category_id)) {
            $query->where('business_category_id',  $business_category_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('department_name', function (Rlco $rlco){
                return $rlco->department->department_name??'';
            })
            ->editColumn('rlco_status', function (Rlco $rlco){
                return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.rlcos.destroy',$rlco).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($rlco->rlco_status?'btn-hover-success':'btn-hover-danger').'">'.$rlco->getRlcoStatus().'</span>';
            })
            ->addColumn('action', function(Rlco $rlco){
                $actionBtn = '<span onclick="toggleStatus(this); return false;"  data-href="'.route('admin.rlcos.destroy',$rlco).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">'.($rlco->rlco_status?'<i class="fa fa-toggle-on text-white"></i>':'<i class="fa fa-toggle-off text-danger"></i>').'</span>';
                $actionBtn .= '&nbsp;&nbsp;<a target="_blank" href="'.route('admin.rlcos.show',$rlco).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
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

    public function store(Request $request)
    {
        //
    }

    public function show(Rlco $rlco): View
    {
        $rlco->load('activities','scopes', 'requiredDocuments.requiredDocument', 'keywords','businessActivities','faqs','foss','dependencies.department', 'otherDocuments');
        return view('admin.rlco.show',compact('rlco'));
    }

    public function edit(Rlco $rlco): View
    {
        $rlco->load('activities','scopes', 'requiredDocuments', 'keywords', 'businessActivities');
        return View('admin.rlco.edit',compact('rlco'));
    }

    public function update(Request $request, Rlco $rlco)
    {
        //
    }

    public function destroy(Rlco $rlco)
    {
        if($rlco->rlco_status)
            session()->flash('success_message', 'Rlco has been inactive successfully.');
        else
            session()->flash('success_message', 'Rlco has been active successfully.');
        $rlco->update(['rlco_status'=>!$rlco->rlco_status]);
        return redirect()->route('admin.rlcos.index');
    }
}
