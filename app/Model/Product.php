<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    //path to save images
    public $photo_path = 'manage_images';

    public function categories()
    {
        return $this->belongsToMany('App\Model\Category');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Model\Group');
    }

    public function attributeValue()
    {
        return $this->belongsToMany('App\Model\AttributeValue', 'product_attribute', 'product_id', 'attribute_value_id');
    }

    public function presentPrice()
    {
        return ( $this->price );
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    public static function getSimpleProduct()
    {
        return Product::where('type_id', 'simple')->get();

    }

    public static function getGroupProduct()
    {
        return Product::where('type_id', 'group')->get();
    }

    public static function getAllProduct()
    {
        $product =  Product::where('active',true)
            ->where('visibility',true)
            ->orderBy('name')
            ->paginate(9);

        return $product;
    }

    public static function getAllImageProduct($id)
    {
        $product = new Product();

        $images = $product->find($id)->images;

        if(empty($images)){
            return [1,2];
        }

        $arr = [];

        foreach (json_decode($images) as $image)
        {
            $arr[] = '/'.$product->photo_path.'/'.$image;
        }

        return $arr;
    }

    public static function getFinalPrice($product)
    {
        return $product->price;
    }

}
