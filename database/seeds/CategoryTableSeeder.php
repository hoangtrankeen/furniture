<?php

use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Laptops', 'parent_id' => '0', 'slug' => 'laptops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktops', 'parent_id' => '0', 'slug' => 'desktops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Phones','parent_id' => '0', 'slug' => 'mobile-phones', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablets', 'parent_id' => '0', 'slug' => 'tablets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'TVs', 'parent_id' => '0', 'slug' => 'tvs', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Cameras', 'parent_id' => '0', 'slug' => 'digital-cameras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Appliances', 'parent_id' => '0', 'slug' => 'appliances', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
