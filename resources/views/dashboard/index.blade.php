@extends('layouts.app')
  
@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')
  
@section('contents')
<div class="container mt-5">
  <div class="card card-waves mb-4 mt-5">
      <div class="card-body p-5">
          <div class="row align-items-center justify-content-between">
              <div class="col">
                  <h2 class="text-danger">Welcome back, your voucher promo dashboard is ready!</h2>
                  <p class="text-gray-700">Sistem voucher/promo management berfungsi mengelola segala bentuk aktivitas customer dengan voucher/promo bisnis.</p>
                  <a class="btn btn-danger btn-sm px-3 py-2" href="{{ route('vouchers') }}">
                      Get Started
                      <i class="ml-1" data-feather="arrow-right"></i>
                  </a>
              </div>
              <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="{{ asset('admin_assets2/assets/img/luwih.png') }}" /></div>
          </div>
      </div>
  </div>
</div>
@endsection