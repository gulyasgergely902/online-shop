<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showItemsList($category) {

    	if($category == "discounted") {
    		$items = \DB::table('items')->where('sale', 1)->get();
    	} else {
    		$items = \DB::table('items')->where('category_id', $category)->get();
    	}

		$category_data = \DB::table('categories')->where('id', $category)->first();

		return view('list-items', [
			'category_data' => $category_data,
			'items' => $items
		]);
    }

    public function addToCart(Request $request, $id) {
        $cart = null;
        if($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = array();
        }

        $i = 0;

        foreach ($cart as $item) {
            if($item[0] == $id){
                $i = 1;
            }
        }

        if($i == 0){
            $item_name = \DB::table('items')->select('name')->where('id', $id)->first();
            $item_data = array($id, $item_name);
            array_push($cart, $item_data);
            $request->session()->put('cart', $cart);
        }

        return redirect('/');
    }

    public function removeFromCart(Request $request, $id){
        $cart = $request->session()->get('cart');
        $i = 0;
        foreach ($cart as $item) {
            if($item[0] == $id){
                \array_splice($cart, $i, 1);
            } else {
                $i = $i + 1;
            }
        }
        $request->session()->put('cart', $cart);
        if(sizeof($cart) == 0){
            $request->session()->forget('cart');
            return redirect('/');
        }
        return redirect('/shopping-cart');
    }

    public function showCartItems(Request $request){
        if($request->session()->has('cart')) {
            $cart_items = $request->session()->get('cart');
            $database_items = \DB::table('items')->get();
            # Build array of items
            $list = array();
            foreach($cart_items as $cart_item){
                foreach ($database_items as $database_item) {
                    if($cart_item[0] == $database_item->id){
                        array_push($list, $database_item);
                    }
                }
            }

            return view('shopping-cart', [
                'items' => $list
            ]);
        } else {
            return redirect('/');
        }
    }
}
