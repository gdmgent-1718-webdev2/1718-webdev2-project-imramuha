<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Koi',
        ]);
        DB::table('categories')->insert([
            'name' => 'Catfish',
        ]);
        DB::table('categories')->insert([
            'name' => 'Tetra',
        ]);
    }
}
