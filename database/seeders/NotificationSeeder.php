<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Notification::create([ 
        'notification_name' => 'お盆期間の配送のお知らせ',
        'admin_user_id' => 1,
        'notification_type' => 1, 
        'notification_content' => <<<EOT
お盆期間の商品の発送ですが,8月8日の12時までのご注文分は8月9日に発送させて頂きます。
それ以降（8月8日12時以降）につきましては8月16日以降の発送となりますので、あらかじめご了承ください。
EOT,
    ]);
    }

}
