<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'Himawari',
            'last_name' => 'Uzumaki',
            'street' => 'Higashi-Mikuni',
            'nr' => '3-9-3-513',
            'postal_code' => '532-0002',
            'province' => 'Osaka-shi',
            'image' => '../assets/img/avatar_admin.jpg',
            'user_id' => '1',
        ]);
        DB::table('customers')->insert([
            'first_name' => 'Yuanaru',
            'last_name' => 'Hiyuba',
            'street' => 'Higashi-Mikuni',
            'nr' => '3-9-3-513',
            'postal_code' => '532-0002',
            'province' => 'Osaka-shi',
            'image' => '../assets/img/avatar_moderator.jpg',
            'user_id' => '2',
        ]);
        DB::table('customers')->insert([
            'first_name' => 'Dana',
            'last_name' => 'Fuller',
            'street' => 'Francesstraat',
            'nr' => '66',
            'postal_code' => '9000',
            'province' => 'Gent',
            'image' => '../assets/img/avatar_customer.jpg',
            'user_id' => '3',
        ]);
        DB::table('customers')->insert([
            'first_name' => 'Imosh',
            'last_name' => 'Meh',
            'street' => 'Gezondstraat',
            'nr' => '19',
            'postal_code' => '9000',
            'province' => 'Gent',
            'image' => '../assets/img/avatar_user.jpg',
            'user_id' => '4',
        ]);
    }
}