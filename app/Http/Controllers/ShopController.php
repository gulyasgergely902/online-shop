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

        return redirect('/shopping-cart');
    }

    public function removeFromCart(Request $request, $id) {
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

    public function showCartItems(Request $request) {
        if($request->session()->has('cart')) {
            $raw_cart_items = $request->session()->get('cart');
            $database_items = \DB::table('items')->get();

            # Build array of items
            $list = array();
            foreach($raw_cart_items as $cart_item){
                foreach ($database_items as $database_item) {
                    if($cart_item[0] == $database_item->id){
                        array_push($list, $database_item);
                    }
                }
            }

            $request->session()->put('cart-list', $list);

            return view('shopping-cart', [
                'items' => $list
            ]);
        } else {
            return redirect('/');
        }
    }

    public function showCheckout(Request $request) {
        $list = $request->session()->get('cart-list');
        $total = 0;
        foreach ($list as $item) {
            if($item->sale == 1)
                $total += $item->sale_price;
            else {
                $total += $item->price;
            }
        }
        return view('checkout', [
            'items' => $list,
            'total' => $total
        ]);
    }

    public function sellItem(Request $request)
    {
        $category_data = \DB::table('categories')->get();
        return view('sell-item', [
            'uid' => $request->input('uid'),
            'category_data' => $category_data
        ]);
    }

    public function createListing(Request $request) {
        $validatedData = $request->validate([
            'itemName' => 'required|max:64',
            'itemDescription' => 'required|max:256',
            'itemPrice' => 'required|integer'
        ]);
        \DB::table('items')->insert(['name' => $request->itemName, 'description' => $request->itemDescription, 'category_id' => $request->itemCategory, 'price' => $request->itemPrice, 'added-by' => $request->uid]);
        return redirect('/profile');
    }

    public function editItem(Request $request) {
        $id = $request->input('id');
        $category_data = \DB::table('categories')->get();
        $item_data = \DB::table('items')->where('id', $id)->first();
        return view('edit-item', [
            'id' => $id,
            'item_data' => $item_data,
            'category_data' => $category_data
        ]);
    }

    public function editListing(Request $request) {
        $discounted = 0;
        if($request->input('isDiscounted') == 'on'){
            $discounted = 1;
        }
        \DB::table('items')->where('id', $request->input('item-id'))->update(['name' => $request->input('itemName'), 'description' => $request->input('itemDescription'), 'category_id' => $request->input('itemCategory'), 'price' => $request->input('itemPrice'), 'sale' => $discounted, 'sale_price' => $request->input('discountedPrice')]);
        return redirect('/profile');
    }

    public function removeListing(Request $request) {
        \DB::table('items')->where('id', $request->input('id'))->delete();
        return redirect('/profile');
    }

    public function showItemDetails($id) {
        $item = \DB::table('items')->where('id', $id)->first();

        $relevant = \DB::table('items')->where('category_id', $item->category_id)->inRandomOrder()->take(3)->get();

        $category_data = \DB::table('categories')->where('id', $item->category_id)->first();

        return view('item-details', [
            'item' => $item,
            'relevant' => $relevant,
            'category_data' => $category_data
        ]);
    }

    public function showSearchPage(Request $request) {
        $items = \DB::table('items')->where('name', 'like', '%' . $request->input('item-name') . '%')->get();
        if(count($items) > 0){
            return view('search-item', [
            'items' => $items
            ]);
        }
        return redirect()->back()->with(['message' => 'Cannot find what you searching for. Try refine your query or try again later', 'alert' => 'alert-warning']);
    }
}
