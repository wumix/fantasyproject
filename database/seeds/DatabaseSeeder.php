<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(UsersActionsTableSeeder::class);
        $this->call(UserActionPointsSeeder::class);

        // $this->call(UsersTableSeeder::class);
    }

}
