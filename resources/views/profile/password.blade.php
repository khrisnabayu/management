@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Password</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('changepassword.store') }}">
                    @csrf

                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        <div class="form-group">
                            <label class="small mb-1" for="inputCurrentPassword">Current Password</label>
                            <input class="form-control" name="current_password" id="inputCurrentPassword" type="password" placeholder="Enter your current password" value="" required/>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputNewPassword">New Password</label>
                            <input class="form-control" name="password" id="inputNewPassword" type="password" placeholder="Enter your new password" value="" required/>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmNewPassword">Confirm New Password</label>
                            <input class="form-control" name="new_password" id="inputConfirmNewPassword" type="password" placeholder="Enter your confirm new password" value="" required />
                        </div>

                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection