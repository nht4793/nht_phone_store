<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
                'cate_name'=>'Iphone',
                'cate_slug'=>'Iphone'
            ],

            [
                'cate_name'=>'Nokia',
                'cate_slug'=>'Nokia'
            ],
        ];

        DB::table('vp_categories')->insert($data);
    }
}
