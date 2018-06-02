<?php

namespace App\Http\Controllers\Backend;

use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    private $photo_path;

    public function __construct(Category $category)
    {
        $this->photo_path = $category->photo_path;
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
            'order'          => 'required|integer',
        ));


        //save image
        if($request->hasFile('image')){
            $photo = $request->file('image');

            if (!is_dir($this->photo_path)) {
                mkdir($this->photo_path, 0777);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
            $feature_image = $resize_name;
            Image::make($photo)->save($this->photo_path . '/' . $resize_name);


        }else{
            $feature_image = '';
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->image = $feature_image;
        $category->order = $request->order;
        $category->save();

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
            'order'          => 'required|integer',
        ));


        $category = Category::findOrFail($id);

        //save image
        if($request->hasFile('image')){
            $photo = $request->file('image');

            if (!is_dir($this->photo_path)) {
                mkdir($this->photo_path, 0777);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
            $feature_image = $resize_name;
            Image::make($photo)->save($this->photo_path . '/' . $resize_name);

            if($category->image){

                if(\File::exists($this->photo_path.'/'.$category->image)){
                    \File::delete($this->photo_path.'/'.$category->image);
                }
            }
        }else{
            $feature_image = $category->image;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->image = $feature_image;
        $category->order = $request->order;

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

        $category->delete();

        Session::flash('success', 'The category was successfully deleted!');
        return redirect()->route('category.index');
    }
}
