@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Medicine Checkup</div>
        <div class="card-header">
            <a class="btn btn-primary text-white" href="{{ route('medicinecheckups.create') }}">Add Data </a>
        </div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registration Date</th>
                            <th>Customer Name</th>
                            <th>Phonenumber</th>
                            <th>Tooth Service</th>
                            <th>Medicine Service</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($medicinecheckup as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->date_registration)->format('M d, Y') }}</td>
                            <td class="align-middle">
                                @foreach($customer as $cs)
                                    @if($cs->id == $rs->id_customer)
                                        {{ $cs->name}}                            
                                    @endif
                                @endforeach
                            </td>
                            <td class="align-middle">
                                @foreach($customer as $cs)
                                    @if($cs->id == $rs->id_customer)
                                        {{ $cs->phonenumber}}                            
                                    @endif
                                @endforeach
                            </td>
                            <td class="align-middle">
                                @foreach($toothservice as $ts)
                                    @if($ts->id == $rs->id_service)
                                        {{ $ts->name}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle">
                                @foreach($medicineservice as $ms)
                                    @if($ms->id == $rs->id_medicine)
                                        {{$ms->name}}                            
                                    @endif
                                @endforeach   
                            </td>
                            <td class="align-middle">{{ $rs->quantity }}</td>
                            <td>
                                <a href="{{ route('medicinecheckups.edit', $rs->id)}}"><button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></button></a>
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
                                                <form action="{{ route('medicinecheckups.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" >
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