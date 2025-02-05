@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Edit Data Account</div>
        <div class="card-body">
            <form action="{{ route('medicinecheckups.update', $medicinecheckup->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label class="small mb-1" for="currentCustomer">Customer Name</label>
                    <select class="form-control" name="id_customer"  id="currentCustomer">
                        @foreach($customer as $rs)
                        <option <?php if ($medicinecheckup->id_customer == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentToothService">Tooth Service</label>
                    <select class="form-control" name="id_service"  id="currentToothservice">
                        @foreach($toothservice as $rs)
                        <option <?php if ($medicinecheckup->id_service == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="small mb-1" for="currentMedicineService">Medicine Service</label>
                    <select class="form-control" name="id_medicine"  id="currentToothservice">
                        @foreach($medicineservice as $rs)
                        <option <?php if ($medicinecheckup->id_medicine == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentQuantity">Quantity</label>
                    <input class="form-control" name="quantity" id="currentQuantity" type="number" placeholder="Enter Your Quantity" value="{{ $medicinecheckup->quantity }}"  />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentRegistrationDate">Registration Date</label>
                    <input class="form-control" name="date_registration" id="currentRegistrationDate" type="date" placeholder="Enter Your Registration Date" value="{{ Carbon\Carbon::parse($medicinecheckup->date_registration)->format('Y-m-d') }}"  />
                </div>

                <div class="form-group">
                    <input class="form-control" name="id_company" id="currentIdCompany" type="hidden" placeholder="Enter Your Company Id" value="{{ auth()->user()->company_id }}"/>
                </div>


                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection