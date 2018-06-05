<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Manager\Catalog;
use App\Model\Product;
use App\Model\Post;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id',0)
            ->where('active',1)
            ->orderBy('order')
            ->get();
        $data['featured'] = Product::where('active',1)
            ->where('featured', 1)
            ->take(6)->get();
//        foreach($categories as $category){
//            $category['products'] = $category->products()->take(6)->get();
//            $category['category'] = $category;
//        }
//
        $data['categories'] = $categories;
        return view('frontend/home', $data);
    }

    public function quickView(Request $request)
    {
        $slug = $request->q;
        $product = Product::where('slug', $slug)->first();
        $product->image = getFeaturedImageProduct($product->image);

        $final_price = Product::getFinalPrice($product);
        $product->priceformat = presentPrice($final_price);
        $product->price = $final_price;
        $data = [
            'product' => $product,
        ];
        return response()->json($data, 200);
    }

    public function catalogCategory($slug, Request $request)
    {
        $pagination = 9;
        $category = Category::where('slug', $slug)->first();
        $products = Product::whereHas('categories', function($query) use($slug){
            $query->where('slug', $slug);
        })->paginate($pagination);

        foreach($products as $key =>  $product)
        {
            $product->final_price = Product::getFinalPrice($product);
        }

        if($request->session()->has('category')){
            $request->session()->forget('category');
        }
        $request->session()->put('category', [
            'name' => $category->name,
            'slug' => $category->slug
        ]);

        $data['products'] = $products;
        $data['category'] = $category;
        return view('frontend/shop', $data);
    }

    public function allProduct(Request $request)
    {
        $pagination = 9;
        $products = Product::where('active',1)->paginate($pagination);

        foreach($products as $key =>  $product)
        {
            $product->final_price = Product::getFinalPrice($product);
        }

        if($request->session()->has('category')){
            $request->session()->forget('category');
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

        $product->final_price = Product::getFinalPrice($product);

        $data['product'] = $product;
        return view('frontend/product',$data);
    }

    public function search(Request $request)
    {
        $pagination = 9;
        $query = $request->input('q');
        $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('sku', 'like', "%$query%");

        if($request->has('sort')) {
            if (request()->sort == 'low_high') {
                $products = $products->orderBy('price');
            } elseif (request()->sort == 'high_low') {
                $products = $products->orderBy('price', 'desc');
            } elseif (request()->sort == 'name') {
                $products = $products->orderBy('name', 'asc');
            } elseif (request()->sort == 'best_seller') {
                $products = $products->where('featured', '1')->orderBy('name', 'asc');
            }
        }
        $products = $products ->paginate($pagination);;
        foreach($products as $key =>  $product)
        {
            $product->final_price = Product::getFinalPrice($product);
        }

        $data['products'] = $products;

        if($request->session()->has('category')){
            $request->session()->forget('category');
        }
//        $result = [];
//
//        foreach ($products as $product){
//            $result[] = [
//                'name' => $product->name,
//                'image' => url(getFeaturedImageProduct($product->image)),
//                'final_price' => presentPrice(Product::getFinalPrice($product))
//            ];
//        }

        return view('frontend/shop', $data);
    }

}
