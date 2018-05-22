<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use Carbon\Carbon;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Tag::insert([
            ['name' => 'Laptops','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktops','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Phones','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablets','created_at' => $now, 'updated_at' => $now],
            ['name' => 'TVs','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Cameras','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Appliances','created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
