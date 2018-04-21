<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

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

    public function attribute()
    {
        return $this->belongsToMany('App\Model\Attribute', 'product_attribute', 'product_id', 'attribute_id');
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

}
