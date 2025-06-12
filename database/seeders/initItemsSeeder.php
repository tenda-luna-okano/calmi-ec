<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class initItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_masters')->insert([
            [
                'category_name' => '消耗品',
            ],
            [
                'category_name' => '化粧品',
            ]
        ]);
        DB::table('sales')->insert([
            [
                'sale_name' => 'テストセール',
                'sale_detail_explanation' => 'テスト用のセール',
                'sale_start_day' => '2025-06-01 17:00:00',
                // 'sale_end_day',
                'sale_is_enable' => 1,
            ]
        ]);
        
        DB::table('customers')->insert([
            [
            'password' => 'tenda',
            'customer_first_name' => '試験',
            'customer_last_name' => '中',
            'customer_first_furigana' => 'シケン',
            'customer_last_furigana' => 'チュウ',
            'email' => 'test@test.com',
            'customer_tel' => '090-1111-1111',
            'customer_birthday'=> '1999-05-29',
            'payment_id' => NULL,
            'customer_post_number' => 1330051,
            'customer_states' => '東京都',
            'customer_municipalities' => '江戸川区',
            'customer_building_name' => 'TKP',
            'customer_status' => 1,
            'customer_subscribe_flg' => 0,
            'mail_magazine_flg' => 1,
            ],
            ['password' => '2',
            'customer_first_name' => '試験',
            'customer_last_name' => '中です',
            'customer_first_furigana' => 'シケン',
            'customer_last_furigana' => 'チュウデス',
            'email' => 'test@test.com',
            'customer_tel' => '090-1111-1111',
            'customer_birthday'=> '1999-05-29',
            'payment_id' => NULL,
            'customer_post_number' => 1330051,
            'customer_states' => '東京都',
            'customer_municipalities' => '江戸川区',
            'customer_building_name' => 'TKP',
            'customer_status' => 1,
            'customer_subscribe_flg_flg' => 0,
            'mail_magazine_flg' => 1,
            ]
        ]);
        DB::table('item_masters')->insert([
            [
                'item_name' => 'テストアイテム1',
                'item_category' => 1,
                'item_price' => 1000,
                'item_price_in_tax' => 1100,
                'seling_flg' => 1,
                'sale_id' => 1,
                'item_detail_explanation' => 'テスト商品１',
                'item_img'=>'img/GABAチョコレート.png',
                'item_stock' => 10,
                'item_review_star' => 3.5,
                'special_subscribe_flg' => 0,
            ],
            [
                'item_name' => 'テストアイテム2',
                'item_category' => 1,
                'item_price' => 2500,
                'item_price_in_tax' => 2750,
                'seling_flg' => 1,
                'sale_id' => 1,
                'item_detail_explanation' => 'テスト商品2',
                'item_img'=>'img/ピローミスト.png',
                'item_stock' => 5,
                'item_review_star' => 4,
                'special_subscribe_flg' => 0,
            ],
            [
                'item_name' => 'テストアイテム3',
                'item_category' => 2,
                'item_price' => 100,
                'item_price_in_tax' => 110,
                'seling_flg' => 1,
                'sale_id'=> NULL,
                'item_detail_explanation' => 'テスト商品3',
                'item_img'=>'img/マカロン.png',
                'item_stock' => 1,
                'item_review_star' => 1,
                'special_subscribe_flg' => 1,
            ]
        ]);
        
        DB::table('carts')->insert([
           [
                'customer_id'=>1,
                'item_id'=>1,
                'item_count'=>3
           ],
           [
                'customer_id'=>2,
                'item_id'=>1,
                'item_count'=>1
           ],
           [
                'customer_id'=>2,
                'item_id'=>2,
                'item_count'=>2
           ]
        ]);
        DB::table('coupon_masters')->insert([

                'coupon_name' => 'テストクーポン',
                'coupon_code' => 'TEST0611',
                'coupon_detail_explanation' => 'テスト用クーポン',
                'coupon_is_enable' => 1,
                'coupon_start_day' => '2025-06-01 17:00:00',
                // 'coupon_end_day',
                // 'coupon_stock',
                'coupon_sale_value' => 20,
                'coupon_category' => 1,

        ]);

    }
}
