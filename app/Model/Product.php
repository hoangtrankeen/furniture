<?php

namespace App\Model;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;

    protected $table = 'products';

    //path to save images
    public $photo_path = 'media/products';

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

    public static function getFinalPrice($product)
    {
        return $product->price;
    }

}
