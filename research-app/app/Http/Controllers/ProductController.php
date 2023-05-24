<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'productName' => 'required|string',
            'productMaterial' => 'required|string',
            'setQuantity' => 'required|integer',
            'setPrice' => 'required|numeric|min:0',
            'productDescription' => 'required|string',
            'productPicture' => 'required|file|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $validatedData['productName'];
        $product->material = $validatedData['productMaterial'];
        $product->quantity = $validatedData['setQuantity'];
        $product->price = $validatedData['setPrice'];
        $product->description = $validatedData['productDescription'];

        if ($request->hasFile('productPicture')) {
            $productPicture = $request->file('productPicture');
            $path = $productPicture->store('product_pictures', 'public');
            $product->product_picture = $path;
        }

        $product->user_id = auth()->id();

        $product->save();

        return redirect()->back()->with('success', 'Product listed successfully!');
    }

    public function index(){
        $products = Product::all();
        return view('Marketplace',compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);

        return view('productDetail', ['product' => $product]);

    }

}
