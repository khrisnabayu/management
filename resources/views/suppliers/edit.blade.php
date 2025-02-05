@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit Data Supplier</div>
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="currentName">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $supplier->name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentDescription">Description</label>
                            <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description" value="{{ $supplier->description }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentAddress">Address</label>
                            <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" value="{{ $supplier->address }}"  />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                            <input class="form-control" name="phonenumber" id="currentPhonenumber" type="text" placeholder="Enter Your Phonenumber" value="{{ $supplier->phonenumber }}" />
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" name="id_company" id="currentIdCompany" type="hidden" placeholder="Enter Your Company Id" value="{{ auth()->user()->company_id }}"/>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection