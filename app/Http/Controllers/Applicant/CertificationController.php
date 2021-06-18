<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificationRequest;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CertificationController extends Controller
{

    public function index(Application $application): View
    {
        //
    }

    public function create(Application $application): View
    {
        return view('applicant.certification.create',compact('application'));
    }

    public function store(StoreCertificationRequest $request, Application $application): RedirectResponse
    {
        $application->certifications()->create($request->validated());
        return redirect(route('applicant.applications.index'))
            ->with('success_message', 'Certificate Request has been added successfully.');
    }

    public function show(Application $application, $id): View
    {
        //
    }

    public function edit(Application $application, $id)
    {
        //
    }

    public function update(Request $request, Application $application, $id)
    {
        //
    }

    public function destroy(Application $application, $id)
    {
        //
    }
}
