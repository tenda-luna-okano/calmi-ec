<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('order_details')->insert([
            'order_id'=>1,
            'item_id'=>1,
            'item_name'=>'テスト商品1',
            'price'=>1100,
            'price_in_tax'=>1200,
            'count'=>1,
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
            'order_price'=>1100,
            'order_price_in_tax'=>1200,
            'is_paid'=>0,
            'is_delivery'=>0,
            'delivery_day'=>'2025-06-12',
            'created_at' => '2025-06-12',
        ]);


    }

}
