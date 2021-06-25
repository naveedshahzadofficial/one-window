<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Models\Registration;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Registration $application): View
    {
        //
    }

    public function create(Registration $registration): View
    {
        return view('applicant.application.create',compact('registration'));
    }

    public function store(StoreApplicationRequest $request, Registration $registration): RedirectResponse
    {
       $application = $registration->application()->create($request->validated());

       $status = Status::where('status_type','applications')->where('status_name','Pending')->first();
       $application->statuses()->save($status,['user_id'=>auth()->id(),'user_type'=>'App\Models\User']);

       return redirect(route('applicant.registrations.index'))
            ->with('success_message', 'Certificate Request has been added successfully.');
    }

    public function show(Registration $registration, $id): View
    {
        //
    }

    public function edit(Registration $registration, $id)
    {
        //
    }

    public function update(Request $request, Registration $registration, $id)
    {
        //
    }

    public function destroy(Registration $registration, $id)
    {
        //
    }
}
