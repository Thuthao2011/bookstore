<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Product; // Import model Product
use App\Book; // Import model Book

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Sản phẩm 1 với sách 1
        $product1 = new Product([
            'name' => 'Sản phẩm 1',
            'description' => 'Mô tả sản phẩm 1',
            'unit_price' => 100.00,
            'promotion_price' => 90.00,
            'image' => 'product1.jpg',
            'unit' => 'Cái',
            'new' => 1,
        ]);
        $product1->save();
        $book1 = new Book([
            'title' => 'Cuốn sách 1',
            'author' => 'Tác giả 1',
            'isbn' => '1234567891',
        ]);
        $product1->book()->save($book1);

        // Sản phẩm 2 với sách 2
        $product2 = new Product([
            'name' => 'Sản phẩm 2',
            'description' => 'Mô tả sản phẩm 2',
            'unit_price' => 120.00,
            'promotion_price' => 110.00,
            'image' => 'product2.jpg',
            'unit' => 'Cái',
            'new' => 0,
        ]);
        $product2->save();
        $book2 = new Book([
            'title' => 'Cuốn sách 2',
            'author' => 'Tác giả 2',
            'isbn' => '1234567892',
        ]);
        $product2->book()->save($book2);

        // Sản phẩm 3 với sách 3
        $product3 = new Product([
            'name' => 'Sản phẩm 3',
            'description' => 'Mô tả sản phẩm 3',
            'unit_price' => 80.00,
            'promotion_price' => 75.00,
            'image' => 'product3.jpg',
            'unit' => 'Cái',
            'new' => 1,
        ]);
        $product3->save();
        $book3 = new Book([
            'title' => 'Cuốn sách 3',
            'author' => 'Tác giả 3',
            'isbn' => '1234567893',
        ]);
        $product3->book()->save($book3);

        // Sản phẩm 4 với sách 4
        $product4 = new Product([
            'name' => 'Sản phẩm 4',
            'description' => 'Mô tả sản phẩm 4',
            'unit_price' => 150.00,
            'promotion_price' => 140.00,
            'image' => 'product4.jpg',
            'unit' => 'Cái',
            'new' => 0,
        ]);
        $product4->save();
        $book4 = new Book([
            'title' => 'Cuốn sách 4',
            'author' => 'Tác giả 4',
            'isbn' => '1234567894',
        ]);
        $product4->book()->save($book4);

        // Sản phẩm 5 với sách 5
        $product5 = new Product([
            'name' => 'Sản phẩm 5',
            'description' => 'Mô tả sản phẩm 5',
            'unit_price' => 70.00,
            'promotion_price' => 65.00,
            'image' => 'product5.jpg',
            'unit' => 'Cái',
            'new' => 1,
        ]);
        $product5->save();
        $book5 = new Book([
            'title' => 'Cuốn sách 5',
            'author' => 'Tác giả 5',
            'isbn' => '1234567895',
        ]);
        $product5->book()->save($book5);
    }
}
