<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


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
            'email'=>'nht4793@gmail.com',
            'password'=>bcrypt('nhtps12285'),
            'level'=>1
          ],

          [
            'email'=>'teonguyen@gmail.com',
            'password'=>bcrypt('123123123'),
            'level'=>1
          ],
        ];
        DB::table('vp_users')->insert($data);
    }
}
