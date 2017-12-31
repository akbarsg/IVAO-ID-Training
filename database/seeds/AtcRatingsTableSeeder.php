<?php

use Illuminate\Database\Seeder;

class AtcRatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atc_ratings')->insert([
            'id' => 0,
            'name' => 'Not an ATC',
            'image' => 'https://ivao.aero/data/images/ratings/atc/0.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 1,
            'name' => 'Not an ATC',
            'image' => 'https://ivao.aero/data/images/ratings/atc/1.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 2,
            'name' => 'ATC Applicant',
            'image' => 'https://ivao.aero/data/images/ratings/atc/2.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 3,
            'name' => 'ATC Trainee',
            'image' => 'https://ivao.aero/data/images/ratings/atc/3.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 4,
            'name' => 'Advanced ATC Trainee',
            'image' => 'https://ivao.aero/data/images/ratings/atc/4.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 5,
            'name' => 'Aerodrome Controller',
            'image' => 'https://ivao.aero/data/images/ratings/atc/5.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 6,
            'name' => 'Approach Controller',
            'image' => 'https://ivao.aero/data/images/ratings/atc/6.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 7,
            'name' => 'Center Controller',
            'image' => 'https://ivao.aero/data/images/ratings/atc/7.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 8,
            'name' => 'Senior Controller',
            'image' => 'https://ivao.aero/data/images/ratings/atc/8.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 9,
            'name' => 'Senior ATC Instructor',
            'image' => 'https://ivao.aero/data/images/ratings/atc/9.gif',
        ]);

        DB::table('atc_ratings')->insert([
        	'id' => 10,
            'name' => 'Chief ATC Instructor',
            'image' => 'https://ivao.aero/data/images/ratings/atc/10.gif',
        ]);

        
    }
}
