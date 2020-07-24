<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'a_customers';
    protected $primaryKey = 'cus_id';
    protected $guarded = [];
    protected $fillable = [
        'cus_name', 'cus_email', 'cus_address', 'cus_phonenumber'
    ];
}
