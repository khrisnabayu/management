@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">

    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-header">Edit Profile Picture</div>
                <div class="card-body text-center">
                    <form action="{{ route('profiles.updatephotoprofile', auth()->user()->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        @if(is_null(auth()->user()->image_path ) or auth()->user()->image_path == '' )
                            <img class="img-account-profile rounded-circle mb-2" src="{{ asset('admin_assets2/assets/img/freepik/profiles/profile-1.png') }}" alt="" />
                        @else 
                            <img class="img-account-profile rounded-circle mb-2" src="/image_profile/{{ auth()->user()->image_path }}" alt="" />
                        @endif
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="file" name="image_path" class="form-control" placeholder="image_path">

                            </div>
                        </div> 
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form action="{{ route('profiles.updateprofile', auth()->user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ auth()->user()->name }}" disabled/>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputRole">Role</label>
                                <input class="form-control" id="inputRole" type="text" placeholder="Enter your role" value="{{ auth()->user()->role }}" disabled/>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputCompanyName">Company Name</label>
                                <input class="form-control" id="inputCompanyName" type="text" placeholder="Enter your company name" value="{{ $companyuser->name }}" disabled />
                            </div>

                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ auth()->user()->email }}" disabled />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" name="first_name" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ auth()->user()->first_name }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" name="last_name" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ auth()->user()->last_name }}" />
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputPhone">Phonenumber</label>
                                <input class="form-control" name="phonenumber" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{ auth()->user()->phonenumber }}" />
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