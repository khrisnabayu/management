@extends('layouts.app')
  
  
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Add Data Service</div>
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="inputName">Name</label>
                    <input class="form-control" name="name" id="inputName" type="text" placeholder="Enter Your Name" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputDescription">Description</label>
                    <textarea class="form-control" name="description" id="inputDescription" type="text" placeholder="Enter Your Description" required ></textarea>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputIconName">Icon Name</label>
                    <input class="form-control" name="icon_name" id="inputIconName" type="text" placeholder="Enter Your Icon Name" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputImage">Image</label>
                    <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image"/>
                </div>

                <button class="btn btn-primary" id="buttonCreateService" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection