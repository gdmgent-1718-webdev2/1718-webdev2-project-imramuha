<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'name' => 'N/A',
            'category_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Flathead',
            'category_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Neow',
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Serpae',
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Glowlight',
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Diamond',
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Dwarf suckers',
            'category_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Ochiba',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Kohaku',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Kikusui',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Doitsu',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Yamabuki',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('subcategories')->insert([
            'name' => 'Showa',
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}