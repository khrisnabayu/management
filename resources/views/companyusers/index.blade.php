@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Company Account Management</div>
        <div class="card-header">
            <!-- <a class="btn btn-primary text-white" href="{{ route('companyusers.create') }}">Add Data </a> -->
            <a class="btn btn-primary text-white mt-2"  data-toggle="modal" data-target="#modalCreate">Add Data</a>
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
                    <form action="{{ route('companyusers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="currentName">Name</label>
                            <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" required/>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentAddress">Address</label>
                            <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" required/>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentEmail">Email</label>
                            <input class="form-control" name="email" id="currentEmail" type="text" placeholder="Enter Your Product Email" required/>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                            <input class="form-control" name="phonenumber" id="currentPhonenumber" type="number" placeholder="Enter Your Phonenumber" required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="currentEmail">Owner</label>
                            <input class="form-control" name="owner" id="currentOwner" type="text" placeholder="Enter Your Owner Name" required/>
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
                            <th>Status</th>
                            <th>Name</th>
                            <th>Phonenumber</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($companyuser as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            @if($rs->active_status == 1)
                                <td><div class="badge badge-success badge-pill">Active</div></td> 
                            @else
                                <td><div class="badge badge-warning badge-pill">Non-Active</div></td> 
                            @endif
                            <td class="align-middle">{{ $rs->name }}</td>
                            <td class="align-middle">{{ $rs->phonenumber }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->start_date)->format('M d, Y') }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->end_date)->format('M d, Y') }}</td>
                            <td class="align-middle">{{ $rs->email }}</td>
                            <td>
                                <!-- <a href="{{ route('companyusers.edit', $rs->id)}}"><button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></button></a> -->
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#edit-{{$rs->id}}"><i data-feather="edit"></i></a>

                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="edit-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Company Account Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('companyusers.update', $rs->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentName">Name</label>
                                                        <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $rs->name }}" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentAddress">Address</label>
                                                        <input class="form-control" name="address" id="currentAddress" type="text" placeholder="Enter Your Address" value="{{ $rs->address }}"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentEmail">Email</label>
                                                        <input class="form-control" name="email" id="currentEmail" type="text" placeholder="Enter Your Email" value="{{ $rs->email }}" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentPhonenumber">Phonenumber</label>
                                                        <input class="form-control" name="phonenumber" id="currentPhonenumber" type="text" placeholder="Enter Your Phonenumber" value="{{ $rs->phonenumber }}" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="currentOwner">Owner</label>
                                                        <input class="form-control" name="owner" id="currentOwner" type="text" placeholder="Enter Your Owner Name" value="{{ $rs->owner }}" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputImage">Image</label>
                                                        <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image Path" value="{{ $rs->image_path }}" />
                                                    </div>

                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="small mb-1" for="inputActiveStatus">Active Status</label>
                                                            <select class="form-control" name="active_status"  id="currentActiveStatus">
                                                                <option <?php if ($rs->active_status == 1) { echo 'selected'; }?> value="1">Active</option>
                                                                <option <?php if ($rs->active_status == 0 || $rs->active_status == ''  ) { echo 'selected'; }?> value="0">Non-Active</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="inputStartDate">Start Date</label>
                                                            <input class="form-control" name="start_date" id="inputStartDate" type="date" placeholder="Enter your start date" value="{{ Carbon\Carbon::parse($rs->start_date)->format('Y-m-d') }}" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="inputEndDate">End Date</label>
                                                            <input class="form-control" name="end_date" id="inputEndDate" type="date" placeholder="Enter your end date" value="{{ Carbon\Carbon::parse($rs->end_date)->format('Y-m-d') }}" />
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="small mb-1" for="inputEndDate">Email</label>
                                                            <select class="form-control" name="emailnotifysubs_status"  id="currentActiveStatus">
                                                                <option <?php if ($rs->emailnotifysubs_status == 1) { echo 'selected'; }?> value="1">Already Notify</option>
                                                                <option <?php if ($rs->emailnotifysubs_status == 0 || $rs->emailnotifysubs_status == ''  ) { echo 'selected'; }?> value="0">Email</option>
                                                            </select>
                                                        </div>
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
                                
                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#delete-{{$rs->id}}"><i data-feather="trash-2"></i></a>
                                <!-- Modal Delete-->
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
                                                <form action="{{ route('companyusers.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-primary p-0" >
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