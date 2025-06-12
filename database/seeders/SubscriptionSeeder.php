<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscribes')->insert([
            [
                'customer_id' => '1',
                'subscribe_detail_id' =>'2',
                'subscribe_start_day'=>'2025-06-12-16:00:00',
                'subscribe_end_day'=>'2025-07-12-16:00:00'
            ],
            [
                'customer_id' => '2',
                'subscribe_detail_id' =>'1',
                'subscribe_start_day'=>'2025-07-12-16:00:00',
                'subscribe_end_day'=>'2025-08-12-16:00:00'
            ],
            [
                'customer_id' => '3',
                'subscribe_detail_id' =>'3',
                'subscribe_start_day'=>'2025-06-11-21:00:00',
                'subscribe_end_day'=>'2025-07-11-21:00:00'
            ],
        ]);
    }
}
