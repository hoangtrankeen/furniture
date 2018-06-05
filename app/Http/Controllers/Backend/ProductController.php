<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Product;
use App\Model\Attribute;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    protected $photos_path;

    public function __construct(Product $product)
    {
        $this->photos_path = $product->photo_path;
    }
    /**
     * Display a listing of the resource.
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);
        $data['products'] = Product::all();

        return view('backend/product/index',$data);
    }
    
    public function create(Request $request)
    {   
        $data['products'] = Product::getSimpleProduct();
        $data['categories'] = Category::all();

        if($request->type == 'group'){
            return view('backend/product/create-group', $data);
        }

        if($request->type == 'simple'){

            $data['attributes'] = Attribute::all();
            return view('backend/product/create-simple', $data);
        }

        Session::flash('error','Product Type not Exist');
        return  redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = $product->categories;


        $cat_ids = [];

        foreach ($categories as $category)
        {
            $cat_ids[] = $category->id;
        }

        $data['product'] = $product;

        $data['all_products'] = Product::getSimpleProduct();

        $data['cat_ids'] = $cat_ids;

        $data['categories'] = Category::all();

        $data['attributes'] = Attribute::all();

        if($product->type_id == 'group'){
            return view('backend/product/edit-group', $data);
        }

        if($product->type_id == 'simple'){
            return view('backend/product/edit-simple', $data);
        }

        Session::flash('error', 'The Product Type not exist');
        return redirect()->back();
    }


}
