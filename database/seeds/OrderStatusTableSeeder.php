<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'name' => 'Pending',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Processing',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'On Hold',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Pending',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Closed',
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'Complete',
        ]);
    }
}
