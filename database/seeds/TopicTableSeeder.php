<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TopicTableSeeder extends Seeder
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
            DB::table('topics')->insert([
                'name' => $faker->name,
                'slug' => $faker->slug,
                'image' => null,
                'parent_id' =>'0',
                'created_by' => null,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
            ]);
        }
    }
}
