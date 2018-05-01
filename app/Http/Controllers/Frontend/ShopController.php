<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Manager\Catalog;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::getAllProduct();
        return view('frontend/home', $data);
    }

    public function catalogCategory($slug)
    {

        $products = Product::whereHas('categories', function($query) use($slug){
            $query->where('slug', $slug);
        })->paginate(9);

        foreach($products as $key =>  $product)
        {
           $product->collect_img = Product::getAllImageProduct($product->id);
           $product->final_price = Product::getFinalPrice($product);
        }

        $data['products'] = $products;
        return view('frontend/shop', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param Product Slug $slug
     * @return \Illuminate\Http\Response
     */
    public function catalogProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $product->collect_img = Product::getAllImageProduct($product->id);
        $product->final_price = Product::getFinalPrice($product);

        $data['product'] = $product;
        return view('frontend/product',$data);
    }
}
