<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $sach = [
            [
                'title' => 'Cuốn theo chiều gió',
                'author' => 'Margaret Mitchell',
                'category' => 'Văn học',
                'price' => 35.99,
                'stock_quantity' => 50,
            ],
            [
                'title' => 'Đắc Nhân Tâm ',
                'author' => 'Dale',
                'category' => 'Truyện ',
                'price' => 15.99,
                'stock_quantity' => 30,
            ],
            [
                'title' => 'Hành tinh của một kẻ nghĩ nhiều ',
                'author' => 'Pipo',
                'category' => 'Truyện',
                'price' => 15.99,
                'stock_quantity' => 30,
            ],
            [
                'title' => 'Bạn đắt giá bao nhiêu?',
                'author' => 'Vãn Tình',
                'category' => 'Tâm lý học',
                'price' => 15.99,
                'stock_quantity' => 30,
            ],
            [
                'title' => 'Tâm lý học tội phạm',
                'author' => 'Duirten',
                'category' => 'Trinh Thám ',
                'price' => 15.99,
                'stock_quantity' => 30,
            ],
            // ...Thêm các sách khác vào đây...
        ];

        foreach ($sach as $item) {
            for ($i = 0; $i < 2; $i++) {
                DB::table('books')->insert([
                    'title' => $item['title'],
                    'author' => $item['author'],
                    'category' => $item['category'],
                    'price' => $item['price'],
                    'stock_quantity' => $item['stock_quantity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
