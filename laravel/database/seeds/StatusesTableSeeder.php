<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'Unknown',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Ongoing',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Ended',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Sold',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Cancled',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Won',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Almost finished',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('statuses')->insert([
            'name' => 'Starting soon',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
