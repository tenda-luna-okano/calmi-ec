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
        //
        DB::table('category_masters')->insert([
            [
                'category_name' => '消耗品',
            ],
            [
                'category_name' => '化粧品',
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

        DB::table('sales')->insert([
            [
                'sale_name' => 'テストセール',
                'sale_detail_explanation' => 'テスト用のセール',
                'sale_start_day' => '2025-06-01 17:00:00',
                // 'sale_end_day',
                'sale_is_enable' => 1,
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
                // 'item_img',
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
                // 'item_img',
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
                // 'item_img',
                'item_stock' => 1,
                'item_review_star' => 1,
                'special_subscribe_flg' => 1,
            ]
        ]);
    }
}
