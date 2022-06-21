<?php

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $faker = Faker::create();

    	foreach (range(1,10) as $index) {
            DB::table('colleges')->insert([
                'name' => $faker->name,
                'address' => Str::random(10),
                'speciality' => Str::random(10),
                'phone_number' => $faker->phoneNumber,
                'no_of_seats' => 200,
                'description' => Str::random(10),
            ]);
        }
    }
}
