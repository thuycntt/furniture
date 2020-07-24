<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'a_products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = [
      'id',  'title', 'price'
    ];
}
