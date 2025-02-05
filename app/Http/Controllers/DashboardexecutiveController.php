<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Companyuser;

use Illuminate\Support\Facades\DB;

class DashboardexecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_id = auth()->user()->company_id;
        $active_status = Companyuser::where('id','=',$company_id)->value('active_status');
        $service_id = Companyuser::where('id','=',$company_id)->value('service_id');
        
        return view('dashboardexecutive.index',compact("active_status","service_id"));
    }
}