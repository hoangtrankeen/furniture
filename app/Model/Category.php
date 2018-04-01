<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
