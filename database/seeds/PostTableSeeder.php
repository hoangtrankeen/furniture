<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 5;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('posts')->insert([ //,
                'title' => $faker->name,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug' => $faker->slug,
                'active' => $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
                'featured' => $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
                'created_by' => null,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,

            ]);
        }
    }
}
