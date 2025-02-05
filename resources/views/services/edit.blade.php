@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">Image Service</div>
                <div class="card-body">
                    <div class="form-group">
                    @if(is_null($service->image_path ) or $service->image_path == '' )
                        <img style="border-radius:10px; width:100%;" src="{{ asset('image/default.jpg') }}" alt="" />
                    @else 
                        <img style="border-radius:10px; width:100%;" src="/image_service/{{ $service->image_path }}" alt="" />
                    @endif
                    </div>

                </div>  
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Edit Data Service</div>
                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="inputName">Name</label>
                            <input class="form-control" name="name" id="inputName" type="text" placeholder="Enter Your Name" value="{{ $service->name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputDescription">Description</label>
                            <textarea class="form-control" name="description" id="inputDescription" type="text" placeholder="Enter Your Description" value="{{ $service->description }}" >{{ $service->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputIconName">Icon Name</label>
                            <input class="form-control" name="icon_name" id="inputIconName" type="text" placeholder="Enter Your Icon Name" value="{{ $service->icon_name }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputImage">Image</label>
                            <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image Path" value="{{ $service->image_path }}" />
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
            
        </div>
</div>
</div>
@endsection