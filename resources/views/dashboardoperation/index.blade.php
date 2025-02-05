@extends('layouts.app')
  
@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')
  
@section('contents')
<!-- Main page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 1-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-primary mb-1">Earnings (monthly)</div>
                            <div class="h5">$4,390</div>
                            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                                <i class="mr-1" data-feather="trending-up"></i>
                                12%
                            </div>
                        </div>
                        <div class="ml-2"><i class="fas fa-dollar-sign fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 2-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-secondary mb-1">Average sale price</div>
                            <div class="h5">$27.00</div>
                            <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                <i class="mr-1" data-feather="trending-down"></i>
                                3%
                            </div>
                        </div>
                        <div class="ml-2"><i class="fas fa-tag fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 3-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-success mb-1">Clicks</div>
                            <div class="h5">11,291</div>
                            <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                                <i class="mr-1" data-feather="trending-up"></i>
                                12%
                            </div>
                        </div>
                        <div class="ml-2"><i class="fas fa-mouse-pointer fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 4-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-info mb-1">Conversion rate</div>
                            <div class="h5">1.23%</div>
                            <div class="text-xs font-weight-bold text-danger d-inline-flex align-items-center">
                                <i class="mr-1" data-feather="trending-down"></i>
                                1%
                            </div>
                        </div>
                        <div class="ml-2"><i class="fas fa-percentage fa-2x text-gray-200"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Area chart example-->
            <div class="card mb-4">
                <div class="card-header">Revenue Summary</div>
                <div class="card-body">
                    <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Bar chart example-->
                    <div class="card h-100">
                        <div class="card-header">Sales Reporting</div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                        </div>
                        <div class="card-footer">
                            <a class="text-xs d-flex align-items-center justify-content-between" href="#!">
                                View More Reports
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Pie chart example-->
                    <div class="card h-100">
                        <div class="card-header">Traffic Sources</div>
                        <div class="card-body">
                            <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <i class="fas fa-circle fa-sm mr-1 text-blue"></i>
                                        Direct
                                    </div>
                                    <div class="font-weight-500 text-dark">55%</div>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <i class="fas fa-circle fa-sm mr-1 text-purple"></i>
                                        Social
                                    </div>
                                    <div class="font-weight-500 text-dark">15%</div>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <i class="fas fa-circle fa-sm mr-1 text-green"></i>
                                        Referral
                                    </div>
                                    <div class="font-weight-500 text-dark">30%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection