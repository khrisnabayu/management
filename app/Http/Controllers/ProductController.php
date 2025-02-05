<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('product'));
    }
  
    public function create()
    {
        return view('products.create');
    }
  
    public function store(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image_path')) {
            $destinationPath = 'image_product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        }
    
        Product::create($input);
        return redirect()->route('products')->with('toast_success','Product added successfully.');

    }
  
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
  
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
  
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if ($image_path = $request->file('image_path')) {
            $destinationPath = 'image_product/';
            $profileImage = date('YmdHis') . "." . $image_path->getClientOriginalExtension();
            $image_path->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
            $product->update($input);
        }
  
        return redirect()->route('products')->with('toast_success', 'product updated successfully');
    }
  
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
  
        return redirect()->route('products')->with('toast_success', 'product deleted successfully');
    }
}