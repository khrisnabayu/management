@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    @if(is_null($companyuser->image_path ) or $companyuser->image_path == '' )
                        <img style="border-radius:10px; width:100%;" src="{{ asset('image_company/default.jpg') }}" alt="" />
                    @else 
                        <img style="border-radius:10px; width:100%;" src="/image_company/{{ $companyuser->image_path }}" alt="" />
                    @endif
                    </div>

                </div>  
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Edit Data Company Account</div>
                <div class="card-body">
                    <form action="{{ route('companyusers.update', $companyuser->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="currentName">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $companyuser->name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentAddress">Address</label>
                            <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" value="{{ $companyuser->address }}"  />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentEmail">Email</label>
                            <input class="form-control" name="email" id="currentEmail" type="text" placeholder="Enter Your Email" value="{{ $companyuser->email }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                            <input class="form-control" name="phonenumber" id="currentPhonenumber" type="text" placeholder="Enter Your Phonenumber" value="{{ $companyuser->phonenumber }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentOwner">Owner</label>
                            <input class="form-control" name="owner" id="currentOwner" type="text" placeholder="Enter Your Owner Name" value="{{ $companyuser->owner }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputImage">Image</label>
                            <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image Path" value="{{ $companyuser->image_path }}" />
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputActiveStatus">Active Status</label>
                                <select class="form-control" name="active_status"  id="currentActiveStatus">
                                    <option <?php if ($companyuser->active_status == 1) { echo 'selected'; }?> value="1">Active</option>
                                    <option <?php if ($companyuser->active_status == 0 || $companyuser->active_status == ''  ) { echo 'selected'; }?> value="0">Non-Active</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputStartDate">Start Date</label>
                                <input class="form-control" name="start_date" id="inputStartDate" type="date" placeholder="Enter your start date" value="{{ Carbon\Carbon::parse($companyuser->start_date)->format('Y-m-d') }}" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputEndDate">End Date</label>
                                <input class="form-control" name="end_date" id="inputEndDate" type="date" placeholder="Enter your end date" value="{{ Carbon\Carbon::parse($companyuser->end_date)->format('Y-m-d') }}" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="inputEndDate">Email</label>
                                <select class="form-control" name="emailnotifysubs_status"  id="currentActiveStatus">
                                    <option <?php if ($companyuser->emailnotifysubs_status == 1) { echo 'selected'; }?> value="1">Already Notify</option>
                                    <option <?php if ($companyuser->emailnotifysubs_status == 0 || $companyuser->emailnotifysubs_status == ''  ) { echo 'selected'; }?> value="0">Email</option>
                                </select>
                            </div>
                        </div>



                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection