<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
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
                'cate_name' => 'Phòng Khách',
                'cate_slug' => str_slug('Phong-Khach')
            ],
            [
                'cate_name' => 'Phòng Ngủ',
                'cate_slug' => str_slug('Phong-Ngu')
            ],
            [
                'cate_name' => 'Nhà bếp',
                'cate_slug' => str_slug('Nha-Bep')
            ],
            [
                'cate_name' => 'Nội Thất Văn Phòng',
                'cate_slug' => str_slug('Noi-That-Van-Phong')
            ],
            [
                'cate_name' => 'Đồ Mỹ Nghệ',
                'cate_slug' => str_slug('Do-My-Nghe')
            ],
        ];
        DB::table('a_categories')->insert($data);
    }
}
