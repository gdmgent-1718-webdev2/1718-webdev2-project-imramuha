<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'message' => 'Hey, I saw your fish Hinata and I am very interested in her. PLease message me back to confirm.',
            'created_at' => Carbon::now(),
            'sender_id' => '2',
            'receiver_id' => '1',
        ]);
        DB::table('messages')->insert([
            'message' => 'Hey, I know right, she is the prettiest, why don-t you post a high bid on her?',
            'created_at' => Carbon::now(),
            'sender_id' => '1',
            'receiver_id' => '2',
        ]);
        DB::table('messages')->insert([
            'message' => 'That-s a great idea! Hoping to win this one, fingers crossed :x',
            'created_at' => Carbon::now(),
            'sender_id' => '2',
            'receiver_id' => '1',
        ]);
    }
}
