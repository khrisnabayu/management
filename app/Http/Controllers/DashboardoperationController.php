<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardoperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardoperation.index');
    }
}