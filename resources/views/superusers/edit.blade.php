@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Edit Data Account</div>
        <div class="card-body">
            <form action="{{ route('superusers.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label class="small mb-1" for="currentEmail">Email</label>
                    <input class="form-control" name="email" id="currentEmail" type="email" placeholder="Enter Your Email" value="{{ $user->email }}" />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentRole">Role</label>
                    <select class="form-control" name="role"  id="currentRole">
                        @foreach($userrole as $rs)
                        <option <?php if ($user->role == $rs->name) { echo 'selected'; }?> value="{{ $rs->name }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentRole">Verified</label>
                    <select class="form-control" name="verified_status"  id="currentRole">
                        <option <?php if ($user->verified_status == 1) { echo 'selected'; }?> value="1">Verified</option>
                        <option <?php if ($user->verified_status == 0 || $user->verified_status == ''  ) { echo 'selected'; }?> value="0">Unverified</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentRole">Company Name</label>
                    <select class="form-control" name="company_id"  id="currentCompanyName">
                        @foreach($companyuser as $rs)
                        <option <?php if ($user->company_id == $rs->id) { echo 'selected'; }?> value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection