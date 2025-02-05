@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Medicine Stock Management</div>
        <div class="card-header">
            <a class="btn btn-primary text-white" href="{{ route('medicinestocks.create') }}">Add Data </a>
        </div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Supplier</th>
                            <th>Produce Date</th>
                            <th>Expired Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($medicinestock as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->name }}</td>
                            <td class="align-middle">{{ $rs->description }}</td>
                            <td class="align-middle">{{ $rs->stock }}</td>
                            <td class="align-middle">{{ $rs->price}}</td>
                            <td class="align-middle">
                                @foreach($supplier as $sp)
                                    @if($sp->id == $rs->id_supplier)
                                        {{$sp->name}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->produced_date)->format('M d, Y') }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->expired_date)->format('M d, Y') }}</td>  
                            <td>
                                <a href="{{ route('medicinestocks.edit', $rs->id)}}"><button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></button></a>
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#delete-{{$rs->id}}"><i data-feather="trash-2"></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="delete-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are sure delete this data ?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('medicinestocks.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger m-0">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection