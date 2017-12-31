<?php

use Illuminate\Database\Seeder;

class PilotRatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pilot_ratings')->insert([
            'id' => 0,
            'name' => 'Not a Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/0.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 1,
            'name' => 'Not an Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/1.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 2,
            'name' => 'Basic Flight Student',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/2.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 3,
            'name' => 'Flight Student',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/3.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 4,
            'name' => 'Advanced Flight Student',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/4.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 5,
            'name' => 'Private Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/5.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 6,
            'name' => 'Senior Private Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/6.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 7,
            'name' => 'Commercial Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/7.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 8,
            'name' => 'Airline Transport Pilot',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/8.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 9,
            'name' => 'Senior Flight Instructor',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/9.gif',
        ]);

        DB::table('pilot_ratings')->insert([
        	'id' => 10,
            'name' => 'Chief Flight Instructor',
            'image' => 'https://ivao.aero/data/images/ratings/pilot/10.gif',
        ]);

        
    }
}
