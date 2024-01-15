<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'username' => 'AdminAL',
            'email' => 'admin@imramuha.com',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'username' => 'ModeratorAL',
            'email' => 'moderator@aqualobby.com',
            'password' => bcrypt('moderator123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'username' => 'CustomerAL',
            'email' => 'customer@aqualobby.com',
            'password' => bcrypt('customer123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'username' => 'Imosh',
            'email' => 'imosh@aqualobby.com',
            'password' => bcrypt('imo631'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 1,
        ]);
    }
}
