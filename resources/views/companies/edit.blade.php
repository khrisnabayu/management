@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    @if(is_null($company->image_path ) or $company->image_path == '' )
                        <img style="border-radius:10px; width:100%;" src="{{ asset('image_company/default.jpg') }}" alt="" />
                    @else 
                        <img style="border-radius:10px; width:100%;" src="/image_company/{{ $company->image_path }}" alt="" />
                    @endif
                    </div>

                </div>  
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Edit Data Company Account</div>
                <div class="card-body">
                    <form action="{{ route('companydatas.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="currentName">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $company->name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentAddress">Address</label>
                            <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" value="{{ $company->address }}"  />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentEmail">Email</label>
                            <input class="form-control" name="email" id="currentEmail" type="text" placeholder="Enter Your Email" value="{{ $company->email }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                            <input class="form-control" name="phonenumber" id="currentPhonenumber" type="text" placeholder="Enter Your Phonenumber" value="{{ $company->phonenumber }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentOwner">Owner</label>
                            <input class="form-control" name="owner" id="currentOwner" type="text" placeholder="Enter Your Owner Name" value="{{ $company->owner }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputImage">Image</label>
                            <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image Path" value="{{ $company->image_path }}" />
                        </div>

                    
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection