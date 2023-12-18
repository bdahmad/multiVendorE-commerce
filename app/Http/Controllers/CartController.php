<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //add to cart
    public function productAddToCart(Request $request, $id){

        $product = Product::findOrFail($id);

        if($product->product_discount_price == null){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_quantity,
                'price' => $product->product_sel_price,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->product_quantity,
                'price' => $request->product_discount_price,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->product_color,
                    'size' => $request->product_size,
                ],
            ]);

            return response()->json([
                'success' => 'Successfully added on your cart',
            ]);
        }

    }

}
