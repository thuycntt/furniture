<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateproductTableSeeder extends Seeder
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
                'cate_id'=>'1',
                'capro_name' => 'Kệ tivi',
                'capro_slug' =>str_slug('ke-tivi')
            ],
            [
                'cate_id'=>'2',
                'capro_name' => 'Giường Ngủ',
                'capro_slug' =>str_slug('giuong-ngu')
            ],
        ];
        DB::table('a_cateproduct')->insert($data);
    }
}
