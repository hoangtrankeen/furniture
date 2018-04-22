<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/shop', 'Frontend\ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'Frontend\ShopController@show')->name('shop.show');

Route::get('/cart', 'Frontend\CartController@index')->name('cart.index');
Route::post('/cart', 'Frontend\CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'Frontend\CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'Frontend\CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'Frontend\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');


// Route::get('/admin', 'ProductController@index')->name('');

Route::prefix('admin')->group(function () {

    Route::get('product/create/{type}','Backend\ProductController@create')->name('product.create');
    Route::resource('product-simple','Backend\ProductSimpleController');
    Route::resource('product-group','Backend\ProductGroupController');

    Route::resource('product','Backend\ProductController');

    Route::resource('category','Backend\CategoryController');

    Route::resource('attribute','Backend\AttributeController');

    Route::resource('attribute-value','Backend\AttributeValueController');
});

Auth::routes();