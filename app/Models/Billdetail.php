<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billdetail extends Model
{
    //
    protected $table = 'a_billdetail';
    protected $primaryKey = 'billde_id';
    protected $guarded = [];
    protected $fillable = ['billde_id','billde_quantily','cus_id','bill_id','pro_id'];
    public function Bill(){
        return $this->belongsTo('App\Models\Bill','bill_id');
    }
   
}
