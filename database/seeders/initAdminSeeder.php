<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admin_users')->insert([
            'admin_email' => 'test@gmail.com',
            'admin_password' => 'testtest',
            'admin_name' => 'testAdmin',
        ]);

        DB::table('columns')->insert([
            [
                'column_name' => 'テストコラム',
                'admin_user_id' => 1,
                // 'column_img' => '',
                'column_content' => 'テスト用のコラム投稿',
                'start_show' => '2025-06-01 17:00:00',
                // 'expire_day' => ,
            ]
        ]);

        DB::table('notifications')->insert([
            'notification_name' => 'テスト用お知らせ',
            'admin_user_id' => 1,
            'notification_type' => 1,
            'notification_content' => 'お知らせです。テストしてます。',
            // 'start_show' => ,
            'expire_day' => '2025-06-20 17:00:00'
        ]);

        DB::table('inquirys')->insert([
            [
                'customer_nickname' => 'せき　たけぞう',
                'customer_mail' => 'test@test.com',
                'inquiry_content' => 'テストのお問い合わせ',
                'answered_flg' => 1,
            ],
            // [
            //     'customer_nickname' => '畠山',
            //     'customer_mail' => 'test2@test.com',
            //     'inquiry_content' => 'これって期限間に合いますか？',
            //     'answered_flg' => 0,
            // ]
        ]);
    }
}
