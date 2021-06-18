<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\District;
use App\Models\Province;
use App\Services\GraphService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $data = array();
        $data['province_graph_data'] = (new GraphService())->provinceWiseData();
        return view('admin.dashboard.index')->with($data);
    }


}
