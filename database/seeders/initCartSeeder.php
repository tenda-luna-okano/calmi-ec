<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('carts')->insert([
            [
            'customer_id' => 1,
            'item_id' => 1,
            'item_count' => 3,
            ],
            [
            'customer_id' => 1,
            'item_id' => 2,
            'item_count' => 1,
            ],
            [
            'customer_id' => 1,
            'item_id' => 3,
            'item_count' => 5,
            ],
        ]);
    }
}
