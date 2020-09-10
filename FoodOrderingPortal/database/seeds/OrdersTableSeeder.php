<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id'=>1,
            'dish_id'=> 1,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>1,
            'dish_id'=>6,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>1,
            'dish_id'=>8,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>1,
            'dish_id'=>20,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>2,
            'dish_id'=>3,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>2,
            'dish_id'=>7,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>2,
            'dish_id'=>14,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>2,
            'dish_id'=>19,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>3,
            'dish_id'=>5,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>3,
            'dish_id'=>10,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>3,
            'dish_id'=>13,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('orders')->insert([
            'user_id'=>3,
            'dish_id'=>18,
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
