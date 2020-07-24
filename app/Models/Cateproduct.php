<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cateproduct extends Model
{
    //
    protected $table ='a_cateproduct';
    protected $primaryKey = 'capro_id';
    protected $guarded = [];
    public function Category(){
        return $this->belongsTo('App\Models\Category','cate_id');
    }
}
