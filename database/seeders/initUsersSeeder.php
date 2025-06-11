<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('post_numbers')->insert([
            'post_number' => 1330051,
            'states' => '俺の前の家',
            'municipalities' => '内緒',
        ]);

        DB::table('customers')->insert([
            'customer_password' => 'tenda',
            'customer_first_name' => '試験',
            'customer_last_name' => '中',
            'customer_first_furigana' => 'シケン',
            'customer_last_furigana' => 'チュウ',
            'customer_email' => 'test@test.com',
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
        ]);
    }
}
