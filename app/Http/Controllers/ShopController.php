<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showItemsList($category){

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
}
