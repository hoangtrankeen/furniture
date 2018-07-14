<?php

namespace App\Http\Controllers\Backend;

use App\Model\AttributeValue;
use App\Model\Category;
use App\Model\Product;
use App\Model\Attribute;
use App\Model\ProductAttribute;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class ProductSimpleController extends ProductController
{

    protected $type_id = 'simple';

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:products,slug',
            'sku'            => 'required|min:5|max:255|unique:products,sku',
            'categories'     => 'required',
            'price'          => 'required|integer',
            'quantity'       => 'required|integer',
            'description'    => 'required',
            'details'        => 'required',
            'images.*'       => 'sometimes|required|image',
            'image'          => 'sometimes|required|image',
            'sort_order'     => 'required|integer',
            'type_id'        => 'required',
        ));

        //Store Image
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

//                Image::make($photo)
//                    ->resize(250, null, function ($constraints) {
//                        $constraints->aspectRatio();
//                    })->save($this->photos_path . '/' . $resize_name);
                Image::make($photo)->save($this->photos_path . '/' . $resize_name);
            }

            $image_name = json_encode($image_name);
        }else{
            $image_name = null;
        }

        if($request->hasFile('image')){
            $photo = $request->file('image');

            if (!is_dir($this->photos_path)) {
                mkdir($this->photos_path, 0777);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
            $feature_image = $resize_name;

//            Image::make($photo)
//                ->resize(250, null, function ($constraints) {
//                    $constraints->aspectRatio();
//                })->save($this->photos_path . '/' . $resize_name);
            Image::make($photo)->save($this->photos_path . '/' . $resize_name);


        }else{
            $feature_image = '';
        }

        //Store Product Parent
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = $request->slug;

        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->details = $request->details;
        $product->description = $request->description;

        $product->featured = $request->featured;
        $product->visibility = $request->visibility;
        $product->active = $request->active;
        $product->in_stock = $request->in_stock;

        $product->images = $image_name;
        $product->image = $feature_image;

        $product->sort_order = $request->sort_order;

        $product->type_id = $this->type_id;

        $product->save();

        //Store Product - Category

        $product->categories()->sync($request->categories);


        $attributes = Attribute::all();

        foreach ($attributes as $attribute){
            if($request->has($attribute->inform_name)  && ($request->input($attribute->inform_name) !== null)){

                if($attribute->type == 'select'){
                    $attr_val_id = $request->input($attribute->inform_name);
                }

                elseif($attribute->type == 'text'){

                    $attr_text_val = new AttributeValue;
                    $attr_text_val->name = $request->input($attribute->inform_name);
                    $attr_text_val->attribute_id = $attribute->id;
                    $attr_text_val->save();

                    $attr_val_id = $attr_text_val->id;

                }else{
                    continue;
                }

                $pro_attr = new ProductAttribute();

                $pro_attr->product_id = $product->id;
                $pro_attr->attribute_value_id = $attr_val_id;

                $pro_attr->save();

            }
        }

        Session::flash('success', 'The product was successfully save!');
        return redirect()->route('product-group.index');
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

        $data['all_products'] = Product::getSimpleProduct();

        $data['cat_ids'] = $cat_ids;

        $data['categories'] = Category::all();

        return view('backend/product/edit-simple', $data);
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
        //Validate
        $this->validate($request, array(
            // rules, criteria
            'name'           => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:255|unique:products,slug,'.$id,
            'sku'            => 'required|min:5|max:255|unique:products,sku,'.$id,
            'categories'     => 'required',
            'price'          => 'required|integer',
            'quantity'       => 'required|integer',
            'description'    => 'required',
            'details'        => 'required',
            'images.*'       => 'sometimes|required|image',
            'image'          => 'sometimes|required|image',
            'sort_order'     => 'required|integer',
            'type_id'        => 'required',
        ));

        $product = Product::find($id);

        //Store Image
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

                Image::make($photo)->save($this->photos_path . '/' . $resize_name);
            }
            $image_name = json_encode($image_name);

            if($product->images){
                foreach (json_decode($product->images) as $image){
                    if(\File::exists($this->photos_path.'/'.$image)){
                    \File::delete($this->photos_path.'/'.$image);
                    }
                }
            }
        }else{
            $image_name = $product->images;
        }

        if($request->hasFile('image')){
            $photo = $request->file('image');

            if (!is_dir($this->photos_path)) {
                mkdir($this->photos_path, 0777);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
            $feature_image = $resize_name;

            Image::make($photo)->save($this->photos_path . '/' . $resize_name);
            if(\File::exists($this->photos_path.'/'.$product->image)){
                \File::delete($this->photos_path.'/'.$product->image);
            }
        }else{
            $feature_image = $product->image;
        }

        $child_array = [];

        foreach (explode(',',$request->child_product) as $child) {
            $child_array[] = (int) $child;
        }

        //Store Product Parent
        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->slug = $request->slug;

        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->details = $request->details;
        $product->description = $request->description;

        $product->featured = $request->featured;
        $product->visibility = $request->visibility;
        $product->active = $request->active;
        $product->in_stock = $request->in_stock;

        $product->images = $image_name;
        $product->image = $feature_image;

        $product->sort_order = $request->sort_order;

        $product->type_id = $request->type_id;

        $product->save();

        //Store Product - Category
        $product->categories()->sync($request->categories);

        $attributes = Attribute::all();

        //Find in form the attribute field that match one's name in attribute table
        foreach ($attributes as $attribute){
            //If found a not null one
            if($request->has($attribute->inform_name)  && ($request->input($attribute->inform_name) !== null)){

                //Because each product just has 1 attribute that related to just 1 attribute value
                //Check if the attribute value (related to the product) exists in attribute value table (base on an exist attribute id above to find)
                //Then we always get just one
                $attr_value = $product->attributeValue()->where('attribute_value.attribute_id', $attribute->id)->first();

                // Found one
                if(!empty($attr_value)){


                    // Just update the new attribute value id of the pivot table when attribute type is select
                    if($attribute->type == 'select'){

                        ProductAttribute::where('product_id',$product->id)
                            ->where('attribute_value_id', $attr_value->id)
                            ->update([
                            'attribute_value_id' => $request->input($attribute->inform_name)
                        ]);

                    }

                    // Just update name field of attribute value table
                    elseif($attribute->type == 'text'){

                        AttributeValue::where('id',$attr_value->id)->update([
                            'name' => $request->input($attribute->inform_name)
                        ]);

                    }else{
                        continue;
                    }

                // if not exist the only case, attribute is text type, then create a new text value and store a new row in pivot table
                }else{

                    if($attribute->type == 'select'){
                        $attr_val_id = $request->input($attribute->inform_name);
                    }

                    elseif($attribute->type == 'text'){

                        $attr_text_val = new AttributeValue;
                        $attr_text_val->name = $request->input($attribute->inform_name);
                        $attr_text_val->attribute_id = $attribute->id;
                        $attr_text_val->save();

                        $attr_val_id = $attr_text_val->id;

                    }else{
                        continue;
                    }

                    $pro_attr = new ProductAttribute();

                    $pro_attr->product_id = $product->id;
                    $pro_attr->attribute_value_id = $attr_val_id;

                    $pro_attr->save();
                }
            }
        }

        Session::flash('success', 'The product was successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Product::where('type_id', 'group')->get();
        $product = Product::findOrFail($id);

        $product->categories()->detach();
        $product->attributeValue()->detach();
        $product->orders()->detach();

        foreach($groups as $group)
        {
            $child_id = json_decode($group->child_id);

            if(is_array($child_id) ){
                $key = array_search($id,$child_id);

                if($key!==false){

                    unset($child_id[$key]);

                    $update = Product::find($group->id);

                    $update->child_id = json_encode($child_id);

                    $update->save();
                }
            }
        }

        $product->delete();

        Session::flash('success', 'The product was successfully deleted!');
        return redirect()->route('product.index');
    }

    public function copy($id)
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

        if($product->type_id == 'simple'){
            return view('backend/product/copy-simple', $data);
        }

        Session::flash('error', 'The Product Type not exist');
        return redirect()->back();
    }

}
