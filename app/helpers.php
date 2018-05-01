<?php

function presentPrice($price)
{
    return ( $price);
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function getImagePath()
{
    return '/manage_images';
}

function getOneProductImg($images)
{
    $images = json_decode($images);
    return  getImagePath().'/'.$images[0];
}

function getFeaturedImageProduct($image)
{
    return  getImagePath().'/'.$image;
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

