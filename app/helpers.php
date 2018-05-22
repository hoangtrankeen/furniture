<?php

function presentPrice($price)
{
    return number_format($price).' VNĐ';
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
    return  getProductImagePath().'/'.$image;
}

function presentDateFormat($date = '')
{
    if($date === null){
        $date = '';
    }else{
        $date = date_format($date,"h:i:s A, d-m-Y");
    }

    return $date;
}

function getProductStatus($status)
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