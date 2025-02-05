@extends('layouts.app')
  
  
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Add Data New Check Up</div>
        <div class="card-body">
            <form action="{{ route('medicinecheckups.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="currentCustomer">Customer Name</label>
                    <select class="form-control" name="id_customer"  id="currentCustomer">
                        @foreach($customer as $rs)
                        <option value="{{ $rs->id }}">{{ $rs->name }} - {{ $rs->phonenumber }} - {{ $rs->address }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currenttoothservice">Tooth Service</label>
                    <select class="form-control" name="id_service"  id="currentToothService">
                        @foreach($toothservice as $rs)
                            <option value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentmedicineservice">Medicine Service</label>
                    <select class="form-control" name="id_medicine"  id="currentMedicineService">
                        @foreach($medicineservice as $rs)
                            @if($rs->stock > 0)
                                <option value="{{ $rs->id }}">{{ $rs->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentQuantity">Quantity</label>
                    <input class="form-control" name="quantity" id="currentQuantity" type="number" placeholder="Enter Your Quantity" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentDate">Date Registration</label>
                    <input class="form-control" name="date_registration" id="currentDate" type="date" placeholder="Enter Your Date" required/>
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