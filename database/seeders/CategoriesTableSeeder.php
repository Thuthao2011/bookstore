<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Văn học',
            'Khoa học',
            'Lịch sử',
            'Kinh tế',
            'Tâm lý',
            'Nghệ thuật',
            'Thể thao',
            'Âm nhạc',
            'Du lịch',
            'Công nghệ',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

