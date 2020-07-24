<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'a_categories';
    protected $primaryKey = 'cate_id';
    protected $fillable=['cate_name','cate_slug'];
    protected $guared = [];
    public function cateproduct(){
        return $this->hasMany('App\Models\Cateproduct', 'cate_id');
    }
}
