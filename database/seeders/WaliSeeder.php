<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class WaliSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('walis')->insert([
                'nik' => $faker->nik,
                'name_parent' => $faker->name,
                'address' => $faker->address,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'phone_number' => $faker->phoneNumber,
            ]);
        }
    }
}
