<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = 'a_bills';
    protected $primaryKey = 'bill_id';
    protected $guarded = [];
    protected $fillable = ['bill_id','bill_day','bill_note','cus_id'];
    public function Billdetail(){
        return $this->hasMany('App\Models\Billdetail','bill_id');
    }
    public function Customer(){
        return $this->hasOne('App\Models\Customer','bill_id');
    }
}
