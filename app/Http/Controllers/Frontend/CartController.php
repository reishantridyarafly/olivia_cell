<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }

    public function addCart($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $userId = auth()->id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->qty;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->qty,
                'price' => $product->after_price
            ]);
        }

        return response()->json(['message' => 'Produk berhasil disimpan']);
    }


    public function getCartItemCount()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();
        $itemCount = 0;

        if ($cart) {
            $itemCount = $cart->items()->count();
        }

        return response()->json(['count' => $itemCount]);
    }
}
