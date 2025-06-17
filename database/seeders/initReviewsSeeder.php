<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class initReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reviews')->insert([
            'review_name'=>'タイトル',
            'customer_nickname'=>1212,
            'review_item_id'=>1,
            'reviewer_age'=>10,
            'review_star'=>1,
            'customer_mail'=>'tenda@tenda',
            'review_content'=>'レビュー本文です、レビュー本文です、レビュー本文です、レビュー本文です、レビュー本文です、レビュー本文です、',
        ]);
    }
}
