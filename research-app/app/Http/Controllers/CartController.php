<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $cartItems = Carts::all();

        return view('cart',compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $user = Auth::user();

        $user->Carts()->create([
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function updateQuantity($cartId, $action)
    {
        $cartItem = Carts::find($cartId);
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }
    
        if ($action === 'increase') {
            if ($cartItem->quantity < $cartItem->product->quantity) {
                $cartItem->quantity++;
            }
        } elseif ($action === 'decrease') {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity--;
            }
        }
    
        $cartItem->save();
    
        $totalPrice = $cartItem->product->price * $cartItem->quantity;
    
        return response()->json([
            'success' => true,
            'quantity' => $cartItem->quantity,
            'totalPriceFormatted' => number_format($totalPrice, 0, ',', '.')
        ]);
    }

    public function delete(Carts $cartItem){
        $cartItem->delete();

        return redirect()->route('cart.index');
    }
}
