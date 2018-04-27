<?php


function presentPrice($price)
{
    return ( $price);
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function getOneProductImg($images)
{
    $images = json_decode($images);
    return  '/manage_images'.'/'.$images[0];
}
