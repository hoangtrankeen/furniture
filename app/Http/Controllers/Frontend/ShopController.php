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
        return view('frontend/shop', $data);
    }

    public function catalogCategory(Category $category)
    {
        $products = Product::whereHas('categories', function($query) use($category){
            $query->where('slug', $category->slug);
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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function catalogProduct(Product $product)
    {
        $product = Product::where('slug', $product->slug)->firstOrFail();

        $product->collect_img = Product::getAllImageProduct($product->id);
        $product->final_price = Product::getFinalPrice($product);

        $data['product'] = $product;
        return view('frontend/product',$data);
    }
}
