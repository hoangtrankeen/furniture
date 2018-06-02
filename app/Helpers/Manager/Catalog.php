<?php
/**
 * Created by PhpStorm.
 * User: HDN
 * Date: 4/19/2018
 * Time: 10:27 PM
 */
namespace App\Helpers\Manager;

use App\Model\Category;
use App\Model\Topic;
use  Illuminate\Support\ServiceProvider;

class Catalog extends ServiceProvider
{
    /**
     * @param $attr
     * @param $product
     * @return string
     * @internal param $attribute
     */
    public static function getCustomAttribute($attr, $product = null)
    {
        $html = '';

        if($product !== null){
            $attr_val = $product->attributeValue()->where('attribute_id',$attr->id)->first();
            if(!empty($attr_val)){
                if ($attr->type == 'select') {

                    $val_html = '';
                    $val_html .= "<option value='' >---Select Value---</option>";

                    foreach ($attr->attributeValue as $value) {

                        $selected = $value->id == $attr_val->id  ? ' selected' : '';
                        $val_id = $value->id;
                        $val_html .= "<option value=$val_id $selected >$value->name</option>";
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
        }
        else{
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

    //Get Recursive Category Menu
    public static function showCategories( $parent_id = 0, $char = '')
    {

        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        $categories = Category::all();
        foreach ($categories as $key => $item){

            // Nếu là chuyên mục con thì hiển thị
            if ((int)$item->parent_id === $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            echo '<ul class="sub-menu">';
            foreach ($cate_child as $key => $item)
            {
                // Hiển thị tiêu đề chuyên mục
                $route = route('catalog.category',['slug'=>$item->slug]);
                echo '<li class="menu_style_dropdown menu-item"><a href='.$route.'>'.$item->name.'</a>';

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showCategories($item->id, $char.'|---');
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    //Get Recursive Category Menu
    public static function showLeftCategories( $parent_id = 0, $char = '')
    {

        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        $categories = Category::all();
        foreach ($categories as $key => $item){

            // Nếu là chuyên mục con thì hiển thị
            if ((int)$item->parent_id === $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            echo '<ul>';
            foreach ($cate_child as $key => $item)
            {
                $has_sub = count($item->childs) ? 'has-sub' :'';
                // Hiển thị tiêu đề chuyên mục
                $route = route('catalog.category',['slug'=>$item->slug]);
                echo '<li class='.$has_sub.'><a href='.$route.'>'.$item->name.'</a>';
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showCategories($item->id, $char.'|---');
                echo '</li>';
            }
            echo '</ul>';
        }
    }


    public static function getAllTopics()
    {
        return Topic::take(6)->get();
    }

//    public static function showTopics( $parent_id = 0, $char = '')
//    {
//
//        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
//        $cate_child = array();
//        $categories = Topic::all();
//        foreach ($categories as $key => $item){
//
//            // Nếu là chuyên mục con thì hiển thị
//            if ((int)$item->parent_id === $parent_id)
//            {
//                $cate_child[] = $item;
//                unset($categories[$key]);
//            }
//        }
//        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
//        if ($cate_child)
//        {
//            echo '<ul class="sub-menu">';
//            foreach ($cate_child as $key => $item)
//            {
//                // Hiển thị tiêu đề chuyên mục
//                $route = route('catalog.category',['slug'=>$item->slug]);
//                echo '<li class="menu_style_dropdown menu-item"><a href='.$route.'>'.$item->name.'</a>';
//
//                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
//                self::showTopicsOption($item->id, $char.'|---');
//                echo '</li>';
//            }
//            echo '</ul>';
//        }
//    }



    public static function showTopicsTable($topics, $parent_id = 0, $char = '')
    {
        foreach ($topics as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id)
            {
                echo '<tr>';
                echo '<td>';
                echo $char . $item['name'];
                echo '</td>';

                echo '<td>';
                echo $item['slug'];
                echo '</td>';

                echo '<td>';
                echo $item['created_at'];
                echo '</td>';

                echo '<td>';
                echo '<a href="'.route('topic.edit', $item['id']).'" class="btn btn-xs btn-info">Edit</a>';
                echo '</td>';

                echo '</tr>';

                // Xóa chuyên mục đã lặp
                unset($topics[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showTopicsTable($topics, $item['id'], $char.'|---');
            }
        }
    }

    public static function getAllProductCategories()
    {
        return Category::where('parent_id', 0)->get();
    }

}