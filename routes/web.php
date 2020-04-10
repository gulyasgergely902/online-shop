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
Route::get('/change-address', 'UserController@changeAddress');
Route::get('/become-seller', 'UserController@becomeSeller');
Route::get('/sell-item', 'ShopController@sellItem');
Route::get('/create-listing', 'ShopController@createListing');
Route::get('/edit-item', 'ShopController@editItem');
Route::get('/edit-listing', 'ShopController@editListing');
Route::get('/remove-listing', 'ShopController@removeListing');
Route::get('/item-details/{id}', 'ShopController@showItemDetails');
Route::get('/search', 'ShopController@showSearchPage');
Route::get('/save-settings', 'UserController@saveSettings');
Route::get('/message/{id}', 'UserController@sendMessage');
Route::get('/delete-message', 'UserController@removeMessage');
Route::get('/pay', 'ShopController@showPaymentPage');