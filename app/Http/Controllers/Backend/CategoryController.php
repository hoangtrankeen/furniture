<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('backend/category/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *b
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('parent_id', 0)->get();

        return view('backend/category/create', $data);
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
            'slug'           => 'required|alpha_dash|unique:products,slug',
            'parent_id'      => 'required|max:255',
        ));

        $product = new Category();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->parent_id = $request->parent_id;
        $product->save();

        Session::flash('success', 'The category was successfully save!');
        return redirect()->route('category.index');
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
        $data['thiscat'] = Category::findOrFail($id);

        $data['categories'] = Category::where('parent_id', 0)->where('id','!=', $id)->get();
        return view('backend/category/edit', $data);
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
            'slug'           => 'required|alpha_dash|max:255|unique:products,slug,'.$id,
            'parent_id'      => 'required|max:255',
        ));

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;

        $category->save();

        Session::flash('success', 'The category was successfully save!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->products()->detach();

        $category->childs()->delete();

        $category->delete();

        Session::flash('success', 'The category was successfully deleted!');
        return redirect()->route('category.index');
    }
}
