<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        $prod_check = Product::where('id', $product_id)->first();

        if ($prod_check) {

            if (Cart::where('prod_id', $product_id)->exists()) {
                return response()->json(['status' => $prod_check->p_name . ' Already added to cart']);
            } else {
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = 1;
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $prod_check->p_name . ' Added to cart']);
            }
        }
    }

    public function viewcart(Request $request)
    {
        $cartItems = Cart::where('user_id', '1')->get();
        return view('/dashboard/cart', [
            'title' => 'Halaman | Cart',
            'cartitems' => $cartItems,
        ]);
    }

    public function deleteproduct(Request $request)
    {
        $prod_id = $request->input('prod_id');

        if (Cart::where('prod_id', $prod_id)->where('user_id', 1)->exists()) {
            $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', 1)->first();
            $cartItem->delete();
            return response()->json(['status' => 'Product Deleted Successfully']);
        }
    }
    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if (Cart::where('prod_id', $prod_id)->where('user_id', 1)->exists()) {
            $cart = Cart::where('prod_id', $prod_id)->where('user_id', 1)->first();
            $cart->prod_qty = $product_qty;
            $cart->update();
            return response()->json(['status' => 'Quantity Updated Successfully']);
        }
    }
    public function cartcount()
    {
        $cartcount = Cart::where('user_id', '1')->count();
        return response()->json(['count' => $cartcount]);
    }
}
