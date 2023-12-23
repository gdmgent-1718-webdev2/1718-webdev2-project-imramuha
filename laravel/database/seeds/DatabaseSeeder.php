<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(FishesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(BidsTableSeeder::class);
    }
}
