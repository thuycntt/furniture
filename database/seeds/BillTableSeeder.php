<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'bill_day' =>'2020-04-19 16:14:45',                 
                'bill_note'=>'Chưa xử lý',
                'pro_cus'=>'1',                        
            ],
        ];
        DB::table('a_bills')->insert($data);
    }
    
}
