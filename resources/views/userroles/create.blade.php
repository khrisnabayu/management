@extends('layouts.app')
  
  
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Add Data User Role</div>
        <div class="card-body">
            <form action="{{ route('userroles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="currentName">Name</label>
                    <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" required/>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection