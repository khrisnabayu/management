<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardfinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboardfinance.index');
    }
}