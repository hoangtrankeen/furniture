<?php
/**
 * Created by PhpStorm.
 * User: HDN
 * Date: 4/19/2018
 * Time: 10:27 PM
 */
namespace App\Helpers\Manager;

use App\Model\ProductAttribute;
use  Illuminate\Support\ServiceProvider;

class Catalog extends ServiceProvider
{
    /**
     * @param $attr
     * @param $product
     * @return string
     * @internal param $attribute
     */
    public static function getCustomAttribute($attr, $product)
    {
        $html = '';

        $attr_val = $product->attributeValue()->where('attribute_id',$attr->id)->first();

        if(!empty($attr_val)){
            if ($attr->type == 'select') {

                $val_html = '';
                $val_html .= "<option value='' >---Select Value---</option>";

                foreach ($attr->attributeValue as $value) {

                    $selected = $value->id == $attr_val->id  ? ' selected' : '';
                    $val_id = $value->id;
                    $val_html .= "<option value=$val_id $selected>$value->name</option>";
                }

                $html = "<select name=$attr->inform_name class='form-control'>$val_html</select>";
            }
            if ($attr->type == 'text') {
                $html = "<input name=$attr->inform_name value=$attr_val->name class='form-control'/>";
            }
        }else{
            if ($attr->type == 'select') {

                $val_html = '';
                $val_html .= "<option value='' >---Select Value---</option>";

                foreach ($attr->attributeValue as $value) {

                    $val_id = $value->id;
                    $val_html .= "<option value=$val_id >$value->name</option>";
                }

                $html = "<select name=$attr->inform_name class='form-control'>$val_html</select>";
            }
            if ($attr->type == 'text') {
                $html = "<input name=$attr->inform_name class='form-control'/>";
            }
        }


        return $html;
    }
}