<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BalitaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('balitas')->insert([
                'wali_id' => $faker->numberBetween(1, 50), // Assuming 50 parents in the wali table
                'name_balita' => $faker->name,
                'nik' => $faker->nik,
                'gender' => $faker->randomElement(['L', 'P']),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now')
                ,
            ]);
        }
    }
}
