<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UploadRequest;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth');
        $this->photos_path = public_path('/manage_images');
    }

    /**
     * Display a listing of the resource.
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();

        return view('backend/product/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:products,slug',
            'details'        => 'required|max:255',
            'categories'    => 'required',
            'price'          => 'required|integer',
            'description'    => 'required|max:255',
            'featured'       => 'required|integer',
            'images'         => 'sometimes|required'
        ));

        $image_name = [];

        if($request->hasFile('images')){
            $photos = $request->file('images');

            if (!is_array($photos)) {
                $photos = [$photos];
            }

            if (!is_dir($this->photos_path)) {
                mkdir($this->photos_path, 0777);
            }

            for ($i = 0; $i < count($photos); $i++) {
                $photo = $photos[$i];
                $name = sha1(date('YmdHis') . str_random(30));
                $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
                $image_name[] =$resize_name;

                Image::make($photo)
                    ->resize(250, null, function ($constraints) {
                        $constraints->aspectRatio();
                    })->save($this->photos_path . '/' . $resize_name);
            }

            $image_name = json_encode($image_name);
        }else{
            $image_name = null;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->featured = $request->featured;
        $product->images = $image_name;
        $product->save();

        $product->categories()->attach($request->categories);

        Session::flash('success', 'The post was successfully save!');
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $data['cat_ids'] = $cat_ids;

        $data['categories'] = Category::all();

        return view('backend/product/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:products,slug,'.$id,
            'details'        => 'required|max:255',
            'categories'     => 'required',
            'price'          => 'required|integer',
            'description'    => 'required|max:255',
            'featured'       => 'required|integer',
            'images.*'         => 'sometimes|required|image'
        ));

        $image_name = [];

        if($request->hasFile('images')){
            $photos = $request->file('images');

            if (!is_array($photos)) {
                $photos = [$photos];
            }

            if (!is_dir($this->photos_path)) {
                mkdir($this->photos_path, 0777);
            }

            for ($i = 0; $i < count($photos); $i++) {
                $photo = $photos[$i];
                $name = sha1(date('YmdHis') . str_random(30));
                $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
                $image_name[] =$resize_name;

                Image::make($photo)
                    ->resize(250, null, function ($constraints) {
                        $constraints->aspectRatio();
                    })->save($this->photos_path . '/' . $resize_name);
            }

            $image_name = json_encode($image_name);
        }else{
            $image_name = null;
        }

        $product =  Product::findOrFail($id);

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->featured = $request->featured;
        if($request->hasFile('images')) {
            $product->images = $image_name;
        }
        $product->save();

        $product->categories()->attach($request->categories);

        Session::flash('success', 'The post was successfully updated!');
        return redirect()->route('product.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->categories()->detach();

        $product->delete();

        Session::flash('success', 'The product was successfully deleted!');
        return redirect()->route('product.index');
    }
}
