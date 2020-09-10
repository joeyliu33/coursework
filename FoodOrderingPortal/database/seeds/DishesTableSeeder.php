<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dishes')->insert([
            'name'=>'Beef burger',
            'price'=>'12',
            'user_id'=>4,
            'image'=>'kidBeef.jpg',
            'updated_at'=>  DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Chicken burger',
            'price'=>'13',
            'user_id'=>4,
            'image'=>'chickenBurger.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'cheesy Pork Burger',
            'price'=>'12',
            'user_id'=>4,
            'image'=>'cheesyPork.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Getta combo',
            'price'=>'20',
            'user_id'=>4,
            'image'=>'Getta.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Tranditional Burger',
            'price'=>'16',
            'user_id'=>4,
            'image'=>'tranditional.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Vegetarian Burger',
            'price'=>'19',
            'user_id'=>4,
            'image'=>'Vego.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Chips',
            'price'=>'9.5',
            'user_id'=>4,
            'image'=>'chips.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Getta combo',
            'price'=>'20',
            'user_id'=>4,
            'image'=>'Getta.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'chicken rolls',
            'price'=>'4.8',
            'user_id'=>5,
            'image'=>'chicken.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'plain inari',
            'price'=>'2',
            'user_id'=>5,
            'image'=>'inari.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'prawn handroll',
            'price'=>'4',
            'user_id'=>5,
            'image'=>'prawn.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'rainbow rolls',
            'price'=>'4.5',
            'user_id'=>5,
            'image'=>'rainbowroll.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'red fish nigiri',
            'price'=>'4.8',
            'user_id'=> 5,
            'image'=>'RedNigiri.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'salmon nigiri',
            'price'=>'4.8',
            'user_id'=> 5,
            'image'=>'salmon.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'tuna nigiri',
            'price'=>'4.8',
            'user_id'=> 5,
            'image'=>'tuna.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'white fish nigiri',
            'price'=>'4.8',
            'user_id'=> 5,
            'image'=>'whiteNigiri.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Dumplings',
            'price'=>'5',
            'user_id'=> 6,
            'image'=>'Dumpling.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Spring rolls',
            'price'=>'4',
            'user_id'=> 6,
            'image'=>'springRoll.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Vegetable',
            'price'=>'10.5',
            'user_id'=> 6,
            'image'=>'Veget.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Fried Noodles',
            'price'=>'12',
            'user_id'=> 6,
            'image'=>'frieNoodle.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Fried Rice',
            'price'=> 13,
            'user_id'=> 6,
            'image'=>'FrieRice.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('dishes')->insert([
            'name'=>'Sweet and Soure Chicken',
            'price'=> 14,
            'user_id'=> 6,
            'image'=>'sweetChicken.jpg',
            'updated_at'=> DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
