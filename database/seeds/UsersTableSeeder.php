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
            'name' => 'Aulia Akbar Setyogomo',
            'email' => 'tes@yahoo.co.id',
            'vid' => '370772',
            'status' => 2,
            'atc_rating_id' => 4,
            'pilot_rating_id' => 5,
            'isStaff' => 1,
            'password' => bcrypt('1-lima'),
        ]);

        DB::table('users')->insert([
            'name' => 'Wew wew',
            'email' => 'wew@yahoo.co.id',
            'vid' => '370771',
            'status' => 2,
            'atc_rating_id' => 4,
            'pilot_rating_id' => 4,
            'isStaff' => 0,
            'password' => bcrypt('1-lima'),
        ]);
    }
}
