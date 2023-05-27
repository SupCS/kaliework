<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Создаем и добавляем товары в базу данных
        $products = [
            [
                'name' => 'Свічка Body Woman',
                'description' => 'У 3 ароматах на вибір',
                'price' => 900,
                'image' => 'bodycard.jpg', // Уникальное изображение для товара 1
            ],
            [
                'name' => 'Свічка Body Man',
                'description' => 'У 3 ароматах на вибір',
                'price' => 820,
                'image' => 'bodymancard.jpg', // Уникальное изображение для товара 2
            ],
            [
                'name' => 'Свічка Body Butt',
                'description' => 'Пахне краще, ніж виглядає',
                'price' => 420,
                'image' => 'bodybuttcard.jpg', // Уникальное изображение для товара 3
            ],
            [
                'name' => 'Свічка Test1',
                'description' => 'Перевірка 123',
                'price' => 321,
                'image' => 'bodybuttcard.jpg', // Уникальное изображение для товара 3
            ],
            [
                'name' => 'Свічка Test2',
                'description' => 'Перевірка 456',
                'price' => 123,
                'image' => 'bodybuttcard.jpg', // Уникальное изображение для товара 3
            ],
            [
                'name' => 'Свічка Test3',
                'description' => 'Перевірка 789',
                'price' => 1919,
                'image' => 'bodybuttcard.jpg', // Уникальное изображение для товара 3
            ],
            // Добавьте другие товары с их уникальными изображениями здесь
        ];

        foreach ($products as $productData) {
            $product = Product::firstOrCreate(['name' => $productData['name']], $productData);

            // Проверяем, создан ли продукт или найден существующий

            // Создаем и связываем изображение с товаром
            $imageData = [
                'filename' => $productData['image'], // Путь к изображению товара
                'product_id' => $product->id,
            ];

            $image = new Image($imageData);
            $product->image()->save($image);
        }
    }
}
