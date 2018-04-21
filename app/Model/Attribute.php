<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attribute';

    protected $primaryKey = 'id';

    public function attributeValue()
    {
        return $this->hasMany('App\Model\AttributeValue','attribute_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Model\Product','product_attribute','attribute_id','product_id');
    }

    public static function availableAttributeType()
    {
        return [
          'select',
          'text',
          'textarea',
          'images',
          'checkbox'
        ];
    }

}
