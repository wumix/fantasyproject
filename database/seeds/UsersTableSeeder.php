<?php

use Illuminate\Database\Seeder;

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
            'name' => 'zulfiqar tariq',
            'email' => 'activation.sources@gmail.com',
            'password' => bcrypt('admin'),
            'profile_pic' => 'http://www.google.com',
            'is_active' => (int) 1,
            'user_type' => 1,
            'referral_key' => str_random(20),
            'remember_token' => str_random(20)
        ]);
    }
}
