<?php

function presentPrice($price)
{   if(is_numeric($price)){
        return number_format($price).' đ';
    }else{
    return $price;
    }
}

function priceNoUnit($price)
{   if(is_numeric($price)){
        return number_format($price);
    }else{
    return $price;
    }
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function getProductImagePath()
{
    return '/media/products';
}

function getOneProductImg($images)
{
    $images = json_decode($images);
    return  getProductImagePath().'/'.$images[0];
}

function getFeaturedImageProduct($image)
{
    if($image){
        return  getProductImagePath().'/'.$image;
    }
    return getProductImagePath().'/products/placeholder-image.jpg';
}

function getPostImgPath()
{
    return '/media/posts';
}

function getPostImgFeatured($image)
{
    return  getPostImgPath().'/'.$image;
}

function getCategoryImgPath()
{
    return '/media/categories';
}

function getCategoryImgFeatured($image)
{
    return  getCategoryImgPath().'/'.$image;
}

function presentDateFormat($date = '')
{
    if($date === null){
        $date = '';
    }else{
        $date = new DateTime($date);
        $date = date_format($date,"d-m-Y");
    }

    return $date;
}

function presentDate($date = '')
{
    if($date === null){
        $date = '';
    }else{
        $date = new DateTime($date);
        $date = date_format($date,"d/m/Y");
    }

    return $date;
}

function getProductStockStatus($status)
{
    if($status === 1){
        $status = 'Còn hàng';
    }else{
        $status = 'Hết hàng';
    }

    return $status;
}

function formatStr($str)
{
    return substr($str, 0,20) .'...';
}