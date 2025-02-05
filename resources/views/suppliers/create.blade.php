@extends('layouts.app')
  
  
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Add Data Supplier</div>
        <div class="card-body">
            <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="currentName">Name</label>
                    <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentDescription">Description</label>
                    <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentAddress">Address</label>
                    <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                    <input class="form-control" name="phonenumber" id="currentPhonenumber" type="number" placeholder="Enter Your Phonenumber" required />
                </div>
                
                <div class="form-group">
                    <input class="form-control" name="id_company" id="currentIdCompany" type="hidden" value="{{ auth()->user()->company_id }}"/>
                </div>


                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection