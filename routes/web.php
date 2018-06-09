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


Route::get('/', 'Frontend\ShopController@index')->name('home');

Route::resource('/cart', 'Frontend\CartController');
Route::get('cart', 'Frontend\CartController@index')->name('cart.index');
Route::delete('/cart/remove/{id}', 'Frontend\CartController@destroyCartItem');
Route::post('/cart/update/{id}', 'Frontend\CartController@updateCartItem');
Route::post('/add-to-cart','Frontend\CartController@addCartShopPage');
Route::post('/cart/switchToSaveForLater/{product}', 'Frontend\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::get('/product', 'Frontend\ShopController@allProduct')->name('catalog.product.all');
Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
Route::post('/checkout/store', 'Frontend\CheckoutController@store')->name('checkout.store');
Route::get('/category/{slug}', 'Frontend\ShopController@catalogCategory')->name('catalog.category');
Route::get('/product/{slug}', 'Frontend\ShopController@catalogProduct')->name('catalog.product');
Route::get('/search', 'Frontend\ShopController@search')->name('catalog.search');
Route::get('/quick-view', 'Frontend\ShopController@quickView')->name('catalog.quickview');


Route::get('/post', 'Frontend\BlogController@index')->name('cms.post');
Route::get('/post/{slug}', 'Frontend\BlogController@details')->name('cms.post.detail');
Route::get('/post-category/{slug}', 'Frontend\BlogController@topic')->name('cms.topic');

Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/customer/account', 'Frontend\CustomerController@index')->name('customer.dashboard');
Route::get('/customer/account/edit', 'Frontend\CustomerController@accountEdit')->name('customer.account.edit');
Route::post('/customer/account/update', 'Frontend\CustomerController@accountUpdate')->name('customer.account.update');

Route::prefix('admin')->group(function () {

    Route::get('/', 'Backend\DashboardController@index')->name('admin.home');

    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');


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





