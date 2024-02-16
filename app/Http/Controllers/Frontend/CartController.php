<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $items = \Cart::getContent()->sort();
        // dd($items);

        return view('frontend.cart.cart', compact('items'));
    }

    public function storecart(Request $request)
    {
        $producatData = Product::findorfail($request->product_id);
        $decodedArray = $request->myattributes;

        $productid = $request->product_id;
        if (!empty($decodedArray)) {
            $combinedAttributesString = $productid . '-' . implode('-', $decodedArray);
            // dd($combinedAttributesString);
        } else {
            $combinedAttributesString = $request->product_id;
        }
        // dd($combinedAttributesString);

        \Cart::add(array(
            'id' => $combinedAttributesString,
            // 'id' => $request->product_id,
            'name' => $producatData->product_name,
            'price' => (int)$producatData->product_price-(int)$producatData->discount_amount,
            'quantity' => $request->quantity,
            'attributes' => array(
                "image" => $producatData->featured_image,
                "attr" => $decodedArray
            ),
            'associatedModel' => $producatData
        ));
        $items = \Cart::getContent();
        return $items->count();
    }

    public function addCart($product)
    {

        $producatData = Product::findorfail($product);
        // dd($producatData);
        // dd($producatData);
        \Cart::add(array(
            'id' => $product, // inique row ID
            'name' => $producatData->product_name,
            'price' => $producatData->product_price,
            'quantity' => 1,
            'attributes' => array(
                "image" => $producatData->featured_image
            )
        ));
        $items = \Cart::getContent();

        return $items->count();
    }
    public function removeCart()
    {
        \Cart::clear();
        $items = \Cart::getContent();
        return view('frontend.components.cartData', compact('items'));
    }

    public function removeSingleCart($productid)
    {
        \Cart::remove($productid);
        $items = \Cart::getContent();
        $items_count = $items->count();
        return view('frontend.components.cartData', compact('items', 'items_count'));
    }
    public function addCount($productid)
    {
        //  update a product's quantity
        \Cart::update($productid, array(
            'quantity' => 1,
        ));
        $items = \Cart::getContent()->sort();
        return view('frontend.components.cartData', compact('items'));
    }

    public function subCount($productid)
    {

        \Cart::update($productid, array(
            'quantity' => -1,
        ));
        $items = \Cart::getContent()->sort();
        return view('frontend.components.cartData', compact('items'));
    }
}
