@extends('layouts.app')
  
@section('contents')
<div class="container mt-5">
    <!-- Example DataTable for Dashboard Demo-->
    <div class="card mb-4">
        <div class="card-header">Medical Records Customer</div>
        <div class="card-body">
            <div class="datatable">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Birthday</th>
                            <th>Phonenumber</th>
                            <th>Address</th>
                            <th>Medical Records</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($customer as $rs)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $rs->name }}</td>
                            <td class="align-middle">{{ Carbon\Carbon::parse($rs->birthday)->format('M d, Y') }}</td>
                            <td class="align-middle">{{ $rs->phonenumber }}</td>
                            <td class="align-middle">{{ $rs->address }}</td>
                            <td class="align-middle"><a class="btn btn-success btn-xs text-white" href="{{ route('medicalrecords.detail', $rs->id)}}">Medical Records</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection