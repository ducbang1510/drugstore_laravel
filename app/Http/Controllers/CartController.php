<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImages;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $productId = $request->input('product_id_hidden');

        $product = Product::where("product_id", $productId)->first();
        $productImage = ProductImages::where("product_id", $productId)->first()->path;
        Cart::add([
            'id' => $product->product_id,
            'name' => $product->product_name,
            'qty' => $request->input('quantity'),
            'price' => $product->price,
            'weight' => 0,
            'options' => ['image' => $productImage],
        ]);
        return redirect()->route('showCart', ['product_id'=>$product->product_id])->with('message','Thêm vào giỏ hàng thành công');
    }

    public function showCart()
    {
        $cart = Cart::content();
        //$cart = Cart::instance('qty')->content();
        return view('pages.cart', compact(['cart']));
    }
}
