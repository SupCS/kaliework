<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;
use App\Models\Type;
use App\Models\Size;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Создаем и добавляем типы товаров в базу данных
        $typeNames = ['Свічки', 'Мило', 'Набори', 'Сертифікати'];
        $types = [];
        foreach ($typeNames as $typeName) {
            $types[$typeName] = Type::firstOrCreate(['name' => $typeName]);
        }

        $sizeNames = ['Великі', 'Маленькі'];
        $sizes = [];
        foreach ($sizeNames as $sizeName) {
            $sizes[$sizeName] = Size::firstOrCreate(['name' => $sizeName]);
        }

        // Создаем и добавляем товары в базу данных
        $products = [
            [
                'name' => 'Свічка Body Woman',
                'description' => 'У 3 ароматах на вибір',
                'price' => 900,
                'image' => 'bodycard.jpg',
                'types' => ['Свічки'],
                'sizes' => ['Великі'],
            ],
            [
                'name' => 'Свічка Body Man',
                'description' => 'У 3 ароматах на вибір',
                'price' => 820,
                'image' => 'bodymancard.jpg',
                'types' => ['Свічки'],
                'sizes' => ['Великі'],
            ],
            [
                'name' => 'Свічка Body Butt',
                'description' => 'Пахне краще, ніж виглядає',
                'price' => 420,
                'image' => 'bodybuttcard.jpg',
                'types' => ['Свічки'],
                'sizes' => ['Великі'],
            ],
            [
                'name' => 'Свічка Test1',
                'description' => 'Перевірка 123',
                'price' => 321,
                'image' => 'bodybuttcard.jpg',
                'types' => ['Свічки'],
                'sizes' => ['Маленькі'],
            ],
            [
                'name' => 'Свічка Test2',
                'description' => 'Перевірка 456',
                'price' => 123,
                'image' => 'bodybuttcard.jpg',
                'types' => ['Свічки'],
                'sizes' => ['Маленькі'],
            ],
            [
                'name' => 'Набір Test3',
                'description' => 'Перевірка 789',
                'price' => 1919,
                'image' => 'bodybuttcard.jpg',
                'types' => ['Набори'],
                'sizes' => ['Великі', 'Маленькі'],
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::firstOrCreate(
                ['name' => $productData['name']],
                array_diff_key($productData, ['types' => '', 'sizes' => ''])
            );

            if (isset($productData['types'])) {
                foreach ($productData['types'] as $typeName) {
                    if (isset($types[$typeName])) {
                        $product->types()->attach($types[$typeName]);
                    }
                }
            }

            if (isset($productData['sizes'])) {
                foreach ($productData['sizes'] as $sizeName) {
                    if (isset($sizes[$sizeName])) {
                        $product->sizes()->attach($sizes[$sizeName]);
                    }
                }
            }


            // Создаем и связываем изображение с товаром
            $imageData = [
                'filename' => $productData['image'],
                // Путь к изображению товара
                'product_id' => $product->id,
            ];

            $image = new Image($imageData);
            $product->image()->save($image);
        }
    }
}