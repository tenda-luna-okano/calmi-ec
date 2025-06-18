<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryMaster;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'アロマ',
            'フード',
            'タッチ',
            'ご褒美スイーツ',
        ];

        foreach ($categories as $category) {
            CategoryMaster::create([
                'category_name' => $category,
            ]);
        }
    }
}
