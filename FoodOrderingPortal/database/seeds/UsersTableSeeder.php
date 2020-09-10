<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Bob',
            'email'=>'Bob@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'Jaffa Street',
            'role'=>'customer'
        ]);
        DB::table('users')->insert([
            'name'=>'Fred',
            'email'=>'Fred@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'Heaven Street',
            'role'=>'customer'
        ]);
        DB::table('users')->insert([
            'name'=>'Jane',
            'email'=>'Jane@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'Market Street',
            'role'=>'customer'
        ]);
        DB::table('users')->insert([
            'name'=>'MOS burger',
            'email'=>'MOS@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'MOS Street',
            'role'=>'restaurant'
        ]);
        DB::table('users')->insert([
            'name'=>'sushi sushi',
            'email'=>'ss@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'Sushi Street',
            'role'=>'restaurant'
        ]);
        DB::table('users')->insert([
            'name'=>'YumCha',
            'email'=>'YC@gmail.com',
            'password'=>bcrypt('123456'),
            'address'=>'Yumcha Street',
            'role'=>'restaurant'
        ]);
    }
}
