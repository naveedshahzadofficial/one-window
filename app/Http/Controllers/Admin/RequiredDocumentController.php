<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequiredDocumentRequest;
use App\Models\RequiredDocument;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class RequiredDocumentController extends Controller
{
    public function index(): View
    {
        return View('admin.required_document.index');
    }

    public function indexAjax(Request $request): JsonResponse
    {
        $query = RequiredDocument::select("*");

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('document_status', function (RequiredDocument $required_document){
                return '<span onclick="toggleStatus(this); return false;" data-href="'.route('admin.required-documents.destroy',$required_document).'"   class="btn btn-circle btn-sm border-0 cursor-move active '.($required_document->document_status=='Active'?'btn-hover-success':'btn-hover-danger').'">'.$required_document->document_status.'</span>';
            })
            ->addColumn('action', function(RequiredDocument $required_document){
                $actionBtn = '<span onclick="toggleStatus(this); return false;"  data-href="'.route('admin.required-documents.destroy',$required_document).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs">'.($required_document->document_status=='Active'?'<i class="fa fa-toggle-on text-white"></i>':'<i class="fa fa-toggle-off text-danger"></i>').'</span>';
                $actionBtn .= '&nbsp;&nbsp;<a href="'.route('admin.required-documents.edit',$required_document).'" class="edit btn btn-custom-color text-center btn-circle btn-icon btn-xs"><i class="flaticon-edit text-white"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['document_status','action'])
            ->make(true);
    }

    public function create(): View
    {
        return View('admin.required_document.create');
    }

    public function store(RequiredDocumentRequest $request): RedirectResponse
    {
        $required_document=RequiredDocument::create($request->all());
        if(!$required_document){
            session()->flash('error_message', 'Fail required_document added, please try again.');
            return redirect()->route('admin.required-documents.create');
        }else {
            session()->flash('success_message', 'RequiredDocument has been added successfully.');
            return redirect()->route('admin.required-documents.index');
        }
    }

    public function show(RequiredDocument $required_document): View
    {
        return View('admin.required_document.show',compact('required_document'));
    }

    public function edit(RequiredDocument $required_document): View
    {
        return View('admin.required_document.edit',compact('required_document'));
    }

    public function update(RequiredDocumentRequest $request,  RequiredDocument $required_document): RedirectResponse
    {
        $affected = $required_document->update($request->all());
        if($affected)
            session()->flash('success_message', 'RequiredDocument has been updated successfully.');
        else
            session()->flash('error_message', 'Fail to update the record.');

        return redirect()->route('admin.required-documents.index');
    }

    public function destroy(RequiredDocument $required_document): RedirectResponse
    {

        if($required_document->document_status=='Active')
            session()->flash('success_message', 'RequiredDocument has been inactive successfully.');
        else
            session()->flash('success_message', 'RequiredDocument has been active successfully.');
        $DocumentStatus = $required_document->document_status=='Active'?'Inactive':'Active';
        $required_document->update(['document_status'=>$DocumentStatus]);
        return redirect()->route('admin.required-documents.index');
    }
}
