@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Edit Data User Role</div>
        <div class="card-body">
            <form action="{{ route('userroles.update', $userrole->id) }}" method="POST">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label class="small mb-1" for="currentName">Name</label>
                    <input class="form-control" name="name" id="currentName" type="text" placeholder="Enter Your Name" value="{{ $userrole->name }}" />
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection