<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use Yajra\DataTables\DataTables;

class AuditableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = ['created','updated','deleted','restored'];
        return view('admin.auditable.index')->with($data);
    }

    public function indexAjax(Request $request)
    {

        $event = isset($request->event) && !empty($request->event) ?$request->event: '';

        $query = Audit::query()->select("*");
        if (!empty($event)) {
            $query->where('event',  $event);
        }
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a target="_blank" href="'.route('admin.auditable.show',$row->id).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-eye text-white"></i></a>';
                return $actionBtn;
            })
            ->editColumn('old_values', function(Audit $audit) {
                $table = '<div class="table-responsive-sm"><table class="table table-bordered table-sm">';
                foreach($audit->old_values as $attribute  => $value){
                    $table .= "<tr><td><b>$attribute</b></td><td>$value</td></tr>";
                }
                $table .= '</table></div>';
                return $table;
            })
            ->editColumn('new_values', function(Audit $audit) {
                $table = '<div class="table-responsive-sm"><table class="table table-bordered table-sm">';
                foreach($audit->new_values as $attribute  => $value){
                    $table .= "<tr><td><b>$attribute</b></td><td>$value</td></tr>";
                }
                $table .= '</table></div>';
                return $table;
            })
            ->rawColumns(['old_values','new_values','action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('admin.auditable.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
