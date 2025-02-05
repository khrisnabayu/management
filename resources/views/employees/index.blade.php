@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Employee Management</div>
        <div class="card-header">
            <a class="btn btn-success text-white" href="{{ route('employees.create') }}">Create Employee</a>
        </div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phonenumber</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">
                            @if(is_null($rs->image_path ) or $rs->image_path == '' )
                                <img class="img-account-profile rounded-circle mb-2" style="height:60px;" src="{{ asset('admin_assets2/assets/img/freepik/profiles/profile-1.png') }}" alt="" />
                            @else
                                <img class="img-account-profile rounded-circle mb-2" style="height:60px;" src="/image_profile/{{ $rs->image_path }}" alt="" />
                            @endif

                            </td>
                            <td class="align-middle">{{ $rs->email }}</td>
                            <td class="align-middle">{{ $rs->first_name }}</td>
                            <td class="align-middle">{{ $rs->last_name }}</td>
                            <td class="align-middle">{{ $rs->phonenumber }}</td>
                            <td class="align-middle">{{ $rs->role }}</td>
                            <td class="align-middle">
                                @if( $rs->active_status == 1 )
                                    <div class="badge badge-success badge-pill">Active</div>
                                @else
                                    <div class="badge badge-warning badge-pill">Inactive</div>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('employees.edit', $rs->id)}}"><button class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></button></a>
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