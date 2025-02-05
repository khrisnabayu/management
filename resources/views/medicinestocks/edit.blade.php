@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit Data Medicine Stock</div>
                <div class="card-body">
                    <form action="{{ route('medicinestocks.update', $medicinestock->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="currentName">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $medicinestock->name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentDescription">Description</label>
                            <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description" value="{{ $medicinestock->description }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentPrice">Price</label>
                            <input class="form-control" name="price" id="currentPrice" type="number" placeholder="Enter Your Price" value="{{ $medicinestock->price }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentStock">Stock</label>
                            <input class="form-control" name="stock" id="currentStock" type="number" placeholder="Enter Your Stock" value="{{ $medicinestock->stock }}" />
                        </div>


                        <div class="form-group">
                            <label class="small mb-1" for="currentSupplier">Supplier</label>
                            <select class="form-control" name="id_supplier"  id="currentSupplier">
                                @foreach($supplier as $rs)
                                <option <?php if ($medicinestock->id_supplier == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentProduceDate">Produce Date</label>
                            <input class="form-control" name="produced_date" id="currentProduceDate" type="date" placeholder="Enter Your Produce Date" value="{{ Carbon\Carbon::parse($medicinestock->produced_date)->format('Y-m-d') }}"  />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentExpiredDate">Expired Date</label>
                            <input class="form-control" name="expired_date" id="currentExpiredDate" type="date" placeholder="Enter Your Expired Date" value="{{ Carbon\Carbon::parse($medicinestock->expired_date)->format('Y-m-d') }}" />
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