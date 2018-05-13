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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::resource('/', 'Frontend\ShopController');
Route::resource('/cart', 'Frontend\CartController');
Route::delete('/cart/remove/{id}', 'Frontend\CartController@destroyCartItem');
Route::post('/add-to-cart','Frontend\CartController@addCartShopPage');
Route::post('/cart/switchToSaveForLater/{product}', 'Frontend\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('/san-pham', 'Frontend\ShopController@index')->name('product.all');
Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
Route::post('/checkout', 'Frontend\CheckoutController@store')->name('checkout.store');
Route::get('/danh-muc/{slug}', 'Frontend\ShopController@catalogCategory')->name('catalog.category');
Route::get('/san-pham/{slug}', 'Frontend\ShopController@catalogProduct')->name('catalog.product');
Route::get('/tim-kiem', 'Frontend\ShopController@search')->name('catalog.search');
Route::get('/sort', 'Frontend\ShopController@search')->name('catalog.sort');


// Route::get('/admin', 'ProductController@index')->name('');

Route::prefix('admin')->group(function () {

    Route::get('product/create/{type}','Backend\ProductController@create')->name('product.create');
    Route::resource('product-simple','Backend\ProductSimpleController');
    Route::resource('product-group','Backend\ProductGroupController');

    Route::resource('product','Backend\ProductController');

    Route::resource('category','Backend\CategoryController');

    Route::resource('attribute','Backend\AttributeController');

    Route::resource('order','Backend\OrderController');

});

Auth::routes();





