<?php

namespace App\Http\Controllers;

use App\Models\Rlco;

class HomeController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }

    public function show(Rlco $rlco){
        $rlco->load('activities','requiredDocuments', 'keywords','businessActivities','faqs','foss','dependencies.department', 'otherDocuments');
        return view('frontend.rlco_detail',compact('rlco'));
    }
}
