<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'name' => 'Thanh toán trả sau',
            'description' => 'Quý khách sẽ thanh toán cho bộ phận giao hàng',
            'detail' => ''
        ]);

        DB::table('payment_methods')->insert([
            'name' => 'Thanh toán chuyển khoản',
            'description' => 'Chúng tôi sẽ gửi đến quý khách hướng dẫn chuyển khoản sau khi đặt hàng',
            'detail' => ''
        ]);
    }
}