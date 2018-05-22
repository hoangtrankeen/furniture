<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public  $primaryKey = 'id';

    protected $guarded = [];

    public function children(){
        return $this->hasMany('App\Model\Topic','parent_id','id');
    }
    public function parents(){
        return $this->belongsTo('App\Model\Topic','parent_id','id');
    }

    public function posts(){
        return $this->hasMany('App\Model\Post');
    }
}
