<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BilldetailTableSeeder extends Seeder
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
                'billde_quantily' =>'1', 
                'billde_price' =>'28000000',
                'billde_cus'=>'1',
                'billde_bill'=>'1',
                'billde_pro'=>'7',                        
            ],
        ];
        DB::table('a_billdetail')->insert($data);
    }
}
