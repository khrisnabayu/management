@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">

    <div class="row">
        <div class="col-xl-3">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-body text-center">
                    @if(is_null($employee->image_path ) or $employee->image_path == '' )
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('admin_assets2/assets/img/freepik/profiles/profile-1.png') }}" alt="" />
                    @else 
                        <img class="img-account-profile rounded-circle mb-2" src="/image_profile/{{ $employee->image_path }}" alt="" />
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Employee</div>
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputCompanyName">Company Name</label>
                                <input class="form-control" id="inputCompanyName" type="text" placeholder="Enter your company name" value="{{ $companyuser->name }}" disabled />
                            </div>

                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ $employee->name }}" disabled/>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ $employee->email }}" disabled />
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" name="first_name" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ $employee->first_name }}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="last_name" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ $employee->last_name }}" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputPhonenumber">Phonenumber</label>
                                <input class="form-control" name="phonenumber" id="inputPhonenumber" type="tel" placeholder="Enter your phonenumber" value="{{ $employee->phonenumber }}"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="small mb-1" for="inputActiveStatus">Active Status</label>
                                <select class="form-control" name="active_status"  id="currentActiveStatus">
                                    <option <?php if ($employee->active_status == 1) { echo 'selected'; }?> value="1">Active</option>
                                    <option <?php if ($employee->active_status == 0 || $employee->active_status == ''  ) { echo 'selected'; }?> value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                            <label class="small mb-1" for="currentRole">Role</label>
                            <select class="form-control" name="role"  id="currentRole">
                                @foreach($userrole as $rs)
                                <option <?php if ($employee->role == $rs->name) { echo 'selected'; }?> value="{{ $rs->name }}">{{ $rs->name }}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="small mb-1" for="inputStartDate">Start Date</label>
                                <input class="form-control" name="start_date" id="inputStartDate" type="date" placeholder="Enter your start date" value="{{ Carbon\Carbon::parse($employee->start_date)->format('Y-m-d') }}" />
                            </div>

                            <div class="form-group col-md-3">
                                <label class="small mb-1" for="inputEndDate">Active Status</label>
                                <input class="form-control" name="end_date" id="inputEndDate" type="date" placeholder="Enter your end date" value="{{ Carbon\Carbon::parse($employee->end_date)->format('Y-m-d') }}" />
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection