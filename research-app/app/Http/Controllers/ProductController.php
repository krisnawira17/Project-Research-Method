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

        // Associate the product with the logged-in user
        $product->user_id = auth()->id();

        $product->save();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Product listed successfully!');
    }

}
