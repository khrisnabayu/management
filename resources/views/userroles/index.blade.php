@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">User Role Management</div>
        <div class="card-header">
            <!-- <a class="btn btn-primary text-white" href="{{ route('userroles.create') }}">Add Data </a> -->
            <a class="btn btn-primary text-white mt-2"  data-toggle="modal" data-target="#modalCreate">Create Supplier Data</a>

            
        </div>

                <!-- Modal Create Data -->
                <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaltest">Create Company Account Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('userroles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="currentName">Name</label>
                                <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" required/>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary m-0" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- List Data -->
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($userrole as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->name }}</td>
                            <td>
                                <!-- Edit Data -->
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#edit-{{$rs->id}}"><i data-feather="edit"></i></a>
                                
                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="edit-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User Role Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('userroles.update', $rs->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentName">Name</label>
                                                        <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $rs->name }}" />
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary m-0" type="submit">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <!-- Delete Data -->
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#delete-{{$rs->id}}"><i data-feather="trash-2"></i></a>
                                <!-- Modal Delete Data -->
                                <div class="modal fade" id="delete-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">Are sure delete this data ?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('userroles.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-primary p-0" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-primary m-0">Delete</button>
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