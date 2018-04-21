<?php
/**
 * Created by PhpStorm.
 * User: HDN
 * Date: 4/19/2018
 * Time: 10:27 PM
 */
namespace App\Helpers\Manager;

use  Illuminate\Support\ServiceProvider;

class Catalog extends ServiceProvider
{
    /**
     * @param $attr
     * @param array $attr_values
     * @return string
     */
    public static function getCustomAttribute($attr, $attr_values=[])
    {
        $html = '';

        if($attr->type == 'select'){
            $val_html = '';
            if($attr_values){
                $val_html .= "<option value=''>Select Value</option>";
                foreach ($attr_values as $value) {
                    $val_html .= "<option value=$value->id>".$value->name."</option>";
                }
            }

            $html = "<select name=$attr->inform_name class='form-control'>".$val_html."</select>";
        }

        if($attr->type == 'text'){
            $html = "<input name=$attr->inform_name class='form-control'/>";
        }

        return $html;

    }
}