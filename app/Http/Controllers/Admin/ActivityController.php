<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ActivityController extends Controller
{
    public function index(): View
    {
        return View('admin.activity.index');
    }

    public function indexAjax(Request $request): JsonResponse
    {
        $query = Activity::select("*");

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('activity_status', function (Activity $activity){
                return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.activities.destroy',$activity).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($activity->activity_status==1?'btn-hover-success':'btn-hover-danger').'">'.$activity->getActivityStatus().'</span>';
            })
            ->addColumn('action', function(Activity $activity){
                $actionBtn = '<a href="'.route('admin.activities.show',$activity).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                $actionBtn .= '&nbsp;&nbsp;<a href="'.route('admin.activities.edit',$activity).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['activity_status','action'])
            ->make(true);
    }

    public function create(): View
    {
        return View('admin.activity.create');
    }

    public function store(ActivityRequest $request): RedirectResponse
    {
        $activity=Activity::create($request->all());
        if(!$activity){
            session()->flash('error_message', 'Fail activity added, please try again.');
            return redirect()->route('admin.activities.create');
        }else {
            session()->flash('success_message', 'Activity has been added successfully.');
            return redirect()->route('admin.activities.index');
        }
    }

    public function show(Activity $activity): View
    {
        return View('admin.activity.show',compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return View('admin.activity.edit',compact('activity'));
    }

    public function update(ActivityRequest $request,  Activity $activity): RedirectResponse
    {
        $affected = $activity->update($request->all());
        if($affected)
            session()->flash('success_message', 'Activity has been updated successfully.');
        else
            session()->flash('error_message', 'Fail to update the record.');

        return redirect()->route('admin.activities.index');
    }

    public function destroy(Activity $activity): RedirectResponse
    {

        if($activity->activity_status)
            session()->flash('success_message', 'Activity has been inactive successfully.');
        else
            session()->flash('success_message', 'Activity has been active successfully.');

        $activity->update(['activity_status'=>!$activity->activity_status]);
        return redirect()->route('admin.activities.index');
    }
}
