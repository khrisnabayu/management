@extends('layouts.app')
    
@section('contents')
<div class="container mt-0">

    <div class="row">

        <div class="col-xl-12">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">Create Employee Account</div>
            <div class="card-body">
                <!-- Registration form-->
                <form action="{{ route('employees.registeremployee') }}" method="POST" class="user">
                @csrf
                    <!-- Form Row-->
                    <div class="form-row">
                        <div class="col-md-12">
                            <!-- Form Group (first name)-->
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control py-4 @error('name')is-invalid @enderror" name="name" id="inputFirstName" type="text" placeholder="Enter first name" />
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Form Group (email address)            -->
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4 @error('email')is-invalid @enderror" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Form Row    -->
                    <div class="form-row">
                        <div class="col-md-6">
                            <!-- Form Group (password)-->
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control py-4 @error('password')is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Form Group (confirm password)-->
                            <div class="form-group">
                                <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                <input class="form-control py-4 @error('password_confirmation')is-invalid @enderror" name="password_confirmation" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Group (create account submit)-->
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" >Create Account</button></div>
                </form>
            </div>
        </div>

        </div>
    </div>

    
</div>
@endsection