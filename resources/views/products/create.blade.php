@extends('layouts.app')
  
  
@section('contents')
<div class="container mt-5">
    <div class="card mb-4">
    <div class="card-header">Add Data Product</div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="currentTitle">Title</label>
                    <input class="form-control" name="title" id="currentTitle" type="text" placeholder="Enter Your Title" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentPrice">Price</label>
                    <input class="form-control" name="price" id="currentPrice" type="number" placeholder="Enter Your Price" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentProductCode">Product Code</label>
                    <input class="form-control" name="product_code" id="currentProductCode" type="text" placeholder="Enter Your Product Code" required/>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="currentDescriptionProduct">Description Product</label>
                    <input class="form-control" name="description" id="currentDescription" type="text" placeholder="Enter Your Description Product" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="inputImage">Image</label>
                    <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image" required/>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection