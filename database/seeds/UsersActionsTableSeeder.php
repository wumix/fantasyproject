<?php

use Illuminate\Database\Seeder;

class UsersActionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('user_actions_name')->insert([
            'action_name' => 'User signup',
            'action_key' => 'user_signup',
            'action_description' => 'Trigger when user signsup',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }

}
