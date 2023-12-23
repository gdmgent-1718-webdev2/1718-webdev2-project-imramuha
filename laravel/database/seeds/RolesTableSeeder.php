<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'name' => 'Moderator',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('roles')->insert([
            'name' => 'Customer',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
