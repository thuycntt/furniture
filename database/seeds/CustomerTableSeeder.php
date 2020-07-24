<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerTableSeeder extends Seeder
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
                'cus_name' =>'Lê Thủy',
                'cus_email'=>'thuyle@gmail.com',
                'cus_address'=>'Hà Huy Giáp',
                'cus_phonenumber'=>'0397705522',               
            ],
            [
                'cus_name' =>'Lê Hà',
                'cus_email'=>'ha@gmail.com',
                'cus_address'=>'Hà Huy Giáp',
                'cus_phonenumber'=>'099888773',     
            ],

           
        ];
        DB::table('a_customers')->insert($data);
    }
}
