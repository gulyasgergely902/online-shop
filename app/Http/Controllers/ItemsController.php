<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function show($category){
		$categories = [
			"discounted" => "All the discounted items here.",
			"lowest" => "All the all time lowest priced items here"
		];

		if(! array_key_exists($category, $categories)){
			abort(404, "Category not exists");
		}

		return view('list-items', [
			'category' => $categories[$category]
		]);
    }
}
