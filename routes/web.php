<?php

use App\Model\Category;
use App\Model\Product;
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


    Route::resource('/cart', 'Frontend\CartController');
    Route::post('/cart/switchToSaveForLater/{product}', 'Frontend\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

    Route::get('/san-pham', 'Frontend\ShopController@index')->name('product.all');
    Route::get('/checkout', 'Frontend\CheckoutController@index')->name('checkout');
    Route::post('/checkout', 'Frontend\CheckoutController@store')->name('checkout.store');


    $router = app()->make('router');
    $categories = Category::all();
    $categories->each(function (Category $category) use ($router) {
        $router->get($category->slug, 'Frontend\ShopController@catalogCategory')->defaults('category',$category)->name('category.'.$category->slug);
    });


    $router = app()->make('router');
    $products = Product::all();
    $products->each(function (Product $product) use ($router) {
        $router->get($product->slug, 'Frontend\ShopController@catalogProduct')->defaults('product',$product)->name('product.'.$product->slug);
    });


// Route::get('/admin', 'ProductController@index')->name('');

Route::prefix('admin')->group(function () {

    Route::get('product/create/{type}','Backend\ProductController@create')->name('product.create');
    Route::resource('product-simple','Backend\ProductSimpleController');
    Route::resource('product-group','Backend\ProductGroupController');

    Route::resource('product','Backend\ProductController');

    Route::resource('category','Backend\CategoryController');

    Route::resource('attribute','Backend\AttributeController');

});

Auth::routes();





