<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'payment_name'=>'クレジットカード',
            'card_number'=>0202020202020202,
            'expire'=>0223,
            'card_customer_name'=>'NOZAKIYUUKI',
            'can_use_flg'=>1,
        ]);

        DB::table('orders')->insert([
            'payment_name'=>1,
            'payment_id'=>1,
            'customer_id'=>1,
            'delivery_post_number'=>0123456,
            'delivery_states'=>'埼玉県',
            'delivery_municipalities'=>'朝霞市',
            'delivery_building_name'=>'asaka',
            'delivery_postage'=>200,
            'order_price'=>2000,
            'order_price_in_tax'=>2200,
            'is_paid'=>0,
            'is_delivery'=>0,
            'delivery_day'=>'2025-06-12',
            'created_at' => '2025-06-12',
        ]);

        DB::table('payments')->insert([
            'payment_name'=>'クレジットカード',
            'card_number'=>0202020202020202,
            'expire'=>0223,
            'card_customer_name'=>'NOZAKIYUUKI',
            'can_use_flg'=>1,
        ]);

        DB::table('orders')->insert([
            'payment_name'=>1,
            'payment_id'=>1,
            'customer_id'=>1,
            'delivery_post_number'=>0123456,
            'delivery_states'=>'埼玉県',
            'delivery_municipalities'=>'朝霞市',
            'delivery_building_name'=>'asaka',
            'delivery_postage'=>200,
            'order_price'=>3000,
            'order_price_in_tax'=>3300,
            'is_paid'=>0,
            'is_delivery'=>0,
            'delivery_day'=>'2025-06-12',
            'created_at' => '2025-06-12',
        ]);

        DB::table('payments')->insert([
            'payment_name'=>'クレジットカード',
            'card_number'=>0302020202020202,
            'expire'=> 0123,
            'card_customer_name'=>'SEKITAKEZOU',
            'can_use_flg'=>1,
        ]);

        DB::table('orders')->insert([
            'payment_name'=>1,
            'payment_id'=>1,
            'customer_id'=>1,
            'delivery_post_number'=>0123456,
            'delivery_states'=>'埼玉県',
            'delivery_municipalities'=>'朝霞市',
            'delivery_building_name'=>'asaka',
            'delivery_postage'=>200,
            'order_price'=>10000,
            'order_price_in_tax'=>11000,
            'is_paid'=>0,
            'is_delivery'=>0,
            'delivery_day'=>'2025-06-12',
            'created_at' => '2025-06-12',
        ]);

    }
}
