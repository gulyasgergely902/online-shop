<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function show($category){

		$items = \DB::table('items')->/*select('board_id', 'board_name', 'board_password')*/where('category_id', $category)->get();
		$category_data = \DB::table('categories')->where('id', $category)->first();

		#dd($items);

		return view('list-items', [
			'category_data' => $category_data,
			'items' => $items
		]);
    }
}
