@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Account Management</div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($user as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">
                            @foreach($companyuser as $cu)
                                @if($cu->id == $rs->company_id)
                                    {{ $cu->name}}                            
                                @endif
                            @endforeach
                            </td>

                            <td class="align-middle">{{ $rs->name }}</td>
                            <td class="align-middle">{{ $rs->first_name }}</td>
                            <td class="align-middle">{{ $rs->last_name }}</td>
                            <td class="align-middle">{{ $rs->email }}</td>
                            <td class="align-middle">{{ $rs->role }}</td>
                            @if( $rs->verified_status == 1 )
                                <td><div class="badge badge-success badge-pill">Verified</div></td>
                            @else
                                <td><div class="badge badge-warning badge-pill">Unverified</div></td>
                            @endif  
                            <td>
                                <!-- <a href="{{ route('superusers.edit', $rs->id)}}"><button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></button></a> -->

                                <a class="btn btn-datatable btn-icon btn-transparent-dark"  data-toggle="modal" data-target="#edit-{{$rs->id}}"><i data-feather="edit"></i></a>
                                    
                                <!-- Modal Edit Data-->
                                <div class="modal fade" id="edit-{{$rs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Account Management Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">

                                            <form action="{{ route('superusers.update', $rs->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                                <div class="form-group">
                                                    <label class="small mb-1" for="currentEmail">Email</label>
                                                    <input class="form-control" name="email" id="currentEmail" type="email" placeholder="Enter Your Email" value="{{ $rs->email }}" />
                                                </div>

                                                <div class="form-group">
                                                    <label class="small mb-1" for="currentRole">Role</label>
                                                    <select class="form-control" name="role"  id="currentRole">
                                                        @foreach($userrole as $rd)
                                                        <option <?php if ($rs->role == $rd->name) { echo 'selected'; }?> value="{{ $rd->name }}">{{ $rd->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="small mb-1" for="currentRole">Verified</label>
                                                    <select class="form-control" name="verified_status"  id="currentRole">
                                                        <option <?php if ($rs->verified_status == 1) { echo 'selected'; }?> value="1">Verified</option>
                                                        <option <?php if ($rs->verified_status == 0 || $rs->verified_status == ''  ) { echo 'selected'; }?> value="0">Unverified</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="small mb-1" for="currentRole">Company Name</label>
                                                    <select class="form-control" name="company_id"  id="currentCompanyName">
                                                        @foreach($companyuser as $rd)
                                                        <option <?php if ($rs->company_id == $rd->id) { echo 'selected'; }?> value="{{ $rd->id }}">{{ $rd->name }}</option>
                                                        @endforeach
                                                    </select>
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