<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HistoriSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('historis')->insert([
                'balita_id' => $faker->numberBetween(1, 50), // Assuming 50 babies in the baby table
                'date_record' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'weight_balita' => $faker->randomFloat(1, 2, 10), // Generates a weight between 2 and 10 kg
                'height_balita' => $faker->randomFloat(1, 60, 100), // Generates a height between 60 and 100 cm
                'type_immunization' => $faker->randomElement(['HB', 'Polio', 'MMR', 'DPT']),
                'type_vitamins' => $faker->randomElement(['A', 'B', 'C', 'D']),
            ]);
        }
    }
}
