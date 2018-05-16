<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();
        Customer::create(array(
            'name'     => 'Chan Chan Man',
            'email'    => 'chandler@friend.com',
            'password' => Hash::make('monica'),
        ));
    }
}
