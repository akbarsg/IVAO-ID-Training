<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AtcRatingsTableSeeder::class);
        $this->call(PilotRatingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
