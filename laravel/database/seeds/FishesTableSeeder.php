<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fishes')->insert([
            'name' => 'Nori',
            'size' => '26-35',
            'detail' => 'White spot on belly.',
            'birthdate' => '2015/12/18',
            'sex' => 'Female',
            'image' => '../assets/img/doitsu.jpg',
            'category_id' => '1',
            'subcategory_id' => '11',
            'user_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Hinata',
            'size' => '11-25',
            'detail' => 'Slightly obese and extremely cute.',
            'birthdate' => '2017/02/07',
            'sex' => 'Female',
            'image' => '../assets/img/kohaku.jpg',
            'category_id' => '1',
            'subcategory_id' => '9',
            'user_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Arata',
            'size' => '0-10',
            'detail' => 'Orange mouth.',
            'birthdate' => '2018/03/28',
            'sex' => 'Male',
            'image' => '../assets/img/ochiba.jpg',
            'category_id' => '1',
            'subcategory_id' => '8',
            'user_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Ryu',
            'size' => '51-75',
            'detail' => 'Poops alot.',
            'birthdate' => '2010/09/18',
            'sex' => 'Male',
            'image' => '../assets/img/showa.jpg',
            'category_id' => '1',
            'subcategory_id' => '13',
            'user_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Ariasaki',
            'size' => '0-10',
            'detail' => 'Loves to eat.',
            'birthdate' => '2018/03/16',
            'sex' => 'Male',
            'image' => '../assets/img/yamabuki.jpg',
            'category_id' => '1',
            'subcategory_id' => '12',
            'user_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Jodyn',
            'size' => '36-50',
            'detail' => 'Splashes, but nothing interesting happens.',
            'birthdate' => '2017/04/01',
            'sex' => 'Male',
            'image' => '../assets/img/ochiba3.jpg',
            'category_id' => '1',
            'subcategory_id' => '8',
            'user_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('fishes')->insert([
            'name' => 'Chad',
            'size' => '0-10',
            'detail' => 'Nothing special.',
            'birthdate' => '2018/04/07',
            'sex' => 'Male',
            'image' => '../assets/img/showa2.jpg',
            'category_id' => '1',
            'subcategory_id' => '13',
            'user_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        

       /*{	JSON FORMAT FOR TESTING PURRPAWSES
            "name": "Chadi",
            "size": "0-10",
            "detail": "Nothing supecial.",
            "birthdate": "2018/04/07",
            "sex": "Male",
            "image": "\"../assets/img/showa2.jpg\"",
            "category_id": "1",
            "subcategory_id": "13",
            "user_id": "3",
            "created_at": "2018-08-09 15:57:49"
        } */
    }
}