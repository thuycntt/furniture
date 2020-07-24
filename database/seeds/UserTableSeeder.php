<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
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
                'email' =>'thuylekm16gts@gmail.com',
                'password'=>bcrypt('12345'),
                'level'=>1,               
            ],
            [
                'email' =>'admin@gmail.com',
                'password'=>bcrypt('12345'),
                'level'=>1,               
            ],           
        ];
        DB::table('a_users')->insert($data);
    }
}
