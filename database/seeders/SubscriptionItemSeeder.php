<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //複数行挿入したいのでinsert使ってます
        \App\Models\SubscribeDetailMaster::insert([
            [
            'subscribe_item_name' => 'LightNight',
            'subscribe_price' => 1480,
            'subscribe_detail_explanation' => "「眠る前の、小さなしあわせ」\n
                                                少しだけ、自分にやさしくなる夜。\n
                                                おやすみ前の5分が、心の栄養になるようなアイテムをセレクト。\n
                                                気軽に始めるセルフケア習慣にぴったりな定期便です。\n",
            'subscribe_img' => 'img/subscribe/LightNight.png', // public/images/subscribe に格納
            ],   
            [
            'subscribe_item_name' => 'DeepNight',
            'subscribe_price' => 3480,
            'subscribe_detail_explanation' => "「静かな夜に、こころをゆるめて」\n
                                                暮らしにひとさじの安らぎを。\n
                                                忙しい日々のすき間に、自分だけのナイトルーティンを添えて。\n
                                                穏やかな香りとやさしいごほうびが、月ごとに届きます。\n",
            'subscribe_img' => 'img/subscribe/DeepNight.png', // public/images/subscribe に格納
            ],
            [
            'subscribe_item_name' => 'LuxuaryNight',
            'subscribe_price' => 5480,
            'subscribe_detail_explanation' => "「今日を労う、いちばん深い夜のごほうび」\n
                                                頑張った自分へ贈る、特別な夜の時間。\n
                                                毎月変わるとっておきの癒しを、月のしじまにそっと。\n
                                                ミッドナイトカラーの上質なギフトボックスでお届けします。\n",
            'subscribe_img' => 'img/subscribe/PremiumNight.png', // public/images/subscribe に格納
            ],       
        ]);
        \App\Models\Subscribe::insert([
            [
                'customer_id' => '1',
                'subscribe_detail_id' =>'2',
                'payment_id'=>'1',
                'subscribe_start_day'=>'2025-06-12-16:00:00',
                'subscribe_end_day'=>'2025-07-12-16:00:00'
            ],
            [
                'customer_id' => '2',
                'subscribe_detail_id' =>'1',
                'payment_id'=>'2',
                'subscribe_start_day'=>'2025-07-12-16:00:00',
                'subscribe_end_day'=>'2025-08-12-16:00:00'
            ],
        ]);
    }
}
