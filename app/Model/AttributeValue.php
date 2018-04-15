<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_value';

    protected $primaryKey = 'id';

    public function attribute()
    {
        return $this->belongsTo('App\Model\Attribute');
    }

}
