<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.frontend.cart');
    }
    public function store(Request $request){
        $pro_id = $request->input('pro_id');
        $quantity = $request->input('quantity');
        $product = Product::find($pro_id);
        $pro_name = $product->name;
        $pro_price = $product->price;
        $pro_image = $product->image;
        $data = [
            'id' => $pro_id,
            'name' => $pro_name,
            'price' => $pro_price,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $pro_image
            ]
        ];
        Cart::add($data);
        return redirect()->route('cart.index');
    }
    public function getCheckout($id){
        $product = Product::find($id);
        return view('pages.frontend.checkout',compact('product'));
    }
}
