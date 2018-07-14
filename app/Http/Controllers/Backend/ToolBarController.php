<?php

namespace App\Http\Controllers\Backend;

use App\Model\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolBarController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filterCollection( $products)
   {
       $attributes = Attribute::with('attributeValue')->where('status' , 1)->get();
       if($this->request->has('sort')) {
           if (request()->sort == 'price_asc') {
               $products = $products->orderBy('price', 'asc');
           } elseif (request()->sort == 'price_desc') {
               $products = $products->orderBy('price', 'desc');
           } elseif (request()->sort == 'name_asc') {
               $products = $products->orderBy('name', 'asc');
           }elseif (request()->sort == 'name_desc') {
               $products = $products->orderBy('name', 'desc');
           } elseif (request()->sort == 'featured') {
               $products = $products->where('featured', '1');
           } elseif (request()->sort == 'combo') {
               $products = $products->where('type_id','group');
           }
       }

       if($this->request->has('attribute') == 'attribute'){
           foreach($attributes as $attribute){
               foreach($attribute->attributeValue as $val)
               {
                   if($this->request->attribute == $val->id){
                       $products = $products->whereHas('attributeValue', function ($query) use ($val){
                           $query->where('attribute_value.id',$val->id);
                       });
                   }
               }
           }
       }
       return $products;
   }
}
