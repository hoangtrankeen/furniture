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


Route::get('/', 'Frontend\ShopController@index');
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
Route::get('/quick-view', 'Frontend\ShopController@quickView')->name('catalog.quickview');


Route::get('/bai-viet', 'Frontend\BlogController@index')->name('cms.post');
Route::get('/bai-viet/{slug}', 'Frontend\BlogController@details')->name('cms.post.detail');
Route::get('/chuyen-muc/{slug}', 'Frontend\BlogController@topic')->name('cms.topic');


// route to show the login form
Route::get('customer/login', 'Auth\CustomerAuthController@showLoginForm')->name('customer.login');

// route to process the form
Route::post('customer/login', 'Auth\CustomerAuthController@login')->name('customer.login.submit');

Route::get('/customer', 'Frontend\CustomerController@index')->name('customer.dashboard');

Route::get('customer/logout','Auth\CustomerAuthController@logout')->name('customer.logout');

Route::prefix('admin')->group(function () {

    Route::get('/', 'Backend\DashboardController@index')->name('admin');
    Route::get('product/create/{type}','Backend\ProductController@create')->name('product.create');
    Route::resource('product-simple','Backend\ProductSimpleController');
    Route::resource('product-group','Backend\ProductGroupController');

    Route::resource('product','Backend\ProductController');

    Route::resource('category','Backend\CategoryController');

    Route::resource('attribute','Backend\AttributeController');

    Route::resource('order','Backend\OrderController');

    Route::resource('topic','Backend\TopicController');

    Route::resource('post','Backend\PostController');

    Route::resource('tag','Backend\TagController');

    Route::get('/logout','Auth\LoginController@logout')->name('admin.logout');


});

Auth::routes();





