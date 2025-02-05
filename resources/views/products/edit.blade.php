@extends('layouts.app')
    
@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    @if(is_null($product->image_path ) or $product->image_path == '' )
                        <img style="border-radius:10px; width:100%;" src="{{ asset('image_product/default.jpg') }}" alt="" />
                    @else 
                        <img style="border-radius:10px; width:100%;" src="/image_product/{{ $product->image_path }}" alt="" />
                    @endif
                    </div>

                </div>  
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">Edit Data Product</div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label class="small mb-1" for="currentTitle">Title</label>
                            <input class="form-control" name="title" id="currentTitle" type="text" placeholder="Enter Your Title" value="{{ $product->title }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="newPassword">Price</label>
                            <input class="form-control" name="price" id="currentPrice" type="number" placeholder="Enter Your Price" value="{{ $product->price }}"  />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="confirmProductCode">Product Code</label>
                            <input class="form-control" name="product_code" id="currentProductCode" type="text" placeholder="Enter Your Product Code" value="{{ $product->product_code }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="confirmProductCode">Product Description</label>
                            <input class="form-control" name="description" id="currentProductDescription" type="text" placeholder="Enter Your Product Description" value="{{ $product->description }}" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputImage">Image</label>
                            <input class="form-control" name="image_path" id="inputImage" type="file" placeholder="Enter Your Image Path" value="{{ $product->image_path }}" />
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection