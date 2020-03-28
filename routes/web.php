<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/list-items/{category}', 'ShopController@showItemsList');
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/profile', 'UserController@showProfile');
Route::get('/shopping-cart', 'ShopController@showCartItems');
Route::get('/add-to-cart/{id}', 'ShopController@addToCart');
Route::get('/remove-from-cart/{id}', 'ShopController@removeFromCart');
Route::get('/checkout', 'ShopController@showCheckout');