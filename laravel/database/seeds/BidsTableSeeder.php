<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bids')->insert([
            'bid' => '100',
            'created_at' => Carbon::now(),
            'started_at' => null,
            'ended_at' => null,
            'highest_bidder' => null,
            //'bidders_id' => '[]',
            'seller_id' => '4',
            'status_id' => '8',
            'fish_id' => '1',
        ]);
        DB::table('bids')->insert([
            'bid' => '350',
            'created_at' => Carbon::now()->subHour(50),
            'started_at' => Carbon::now()->subHour(38),
            'ended_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'highest_bidder' => '2',
            'bidders_id' => '[2, 1]',
            'seller_id' => '4',
            'status_id' => '4',
            'fish_id' => '2',
        ]);
        DB::table('bids')->insert([
            'bid' => '350',
            'created_at' => Carbon::now()->subHour(30),
            'started_at' => Carbon::now()->subHour(24),
            'ended_at' =>  Carbon::now()->addHour(15),
            'highest_bidder' => '3',
            'bidders_id' => '[3]',
            'seller_id' => '1',
            'status_id' => '2',
            'fish_id' => '2',
        ]);
    }
}
