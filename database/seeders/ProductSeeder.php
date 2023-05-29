<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;
use App\Models\Type;
use App\Models\Size;
use App\Models\Wick;
use App\Models\Aroma;
use App\Models\Collection;
use App\Models\Color;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Создаем и добавляем типы товаров в базу данных
        $collectionNames = ['HOUSE', 'KIDS', 'Body', 'Valentine\'s', 'Friendship'];
        $collections = [];
        foreach ($collectionNames as $collectionName) {
            $collections[$collectionName] = Collection::firstOrCreate(['name' => $collectionName]);
        }

        $typeNames = ['Свічки', 'Мило', 'Набори', 'Сертифікати'];
        $types = [];
        foreach ($typeNames as $typeName) {
            $types[$typeName] = Type::firstOrCreate(['name' => $typeName]);
        }

        $aromaNames = ['Немає','Цитрусові', 'Квіти', 'Фрукти', 'Екзотика', 'Кастомні'];
        $aromas = [];
        foreach ($aromaNames as $aromaName) {
            $aromas[$aromaName] = Aroma::firstOrCreate(['name' => $aromaName]);
        }

        $sizeNames = ['Великі', 'Маленькі'];
        $sizes = [];
        foreach ($sizeNames as $sizeName) {
            $sizes[$sizeName] = Size::firstOrCreate(['name' => $sizeName]);
        }

        $wickNames = ['Дерев\'яний', 'Бавовняний'];
        $wicks = [];
        foreach ($wickNames as $wickName) {
            $wicks[$wickName] = Wick::firstOrCreate(['name' => $wickName]);
        }

        $colorNames = ['beige', 'pink', 'purple', 'lightgreen', 'red'];
        $colors = [];
        foreach ($colorNames as $colorName) {
            $colors[$colorName] = Color::firstOrCreate(['name' => $colorName]);
        }

        // Создаем и добавляем товары в базу данных
        $products = [
            [
                'name' => 'Свічка Body Woman',
                'description' => 'У 3 ароматах на вибір',
                'price' => 900,
                'image' => 'bodycard.jpg',
                'collections' => ['Body'],
                'types' => ['Свічки'],
                'aromas' => ['Немає', 'Квіти', 'Цитрусові', 'Кастомні'],
                'sizes' => ['Великі'],
                'wicks' => ['Дерев\'яний', 'Бавовняний'],
                'colors' => ['beige', 'pink', 'purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Свічка Body Man',
                'description' => 'У 3 ароматах на вибір',
                'price' => 820,
                'image' => 'bodymancard.jpg',
                'collections' => ['Body'],
                'types' => ['Свічки'],
                'aromas' => ['Немає', 'Квіти', 'Цитрусові', 'Кастомні'],
                'sizes' => ['Великі'],
                'wicks' => ['Дерев\'яний', 'Бавовняний'],
                'colors' => ['beige', 'pink', 'purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Свічка Body Butt',
                'description' => 'Пахне краще, ніж виглядає',
                'price' => 420,
                'image' => 'bodybuttcard.jpg',
                'collections' => ['Body'],
                'types' => ['Свічки'],
                'aromas' => ['Немає', 'Екзотика'],
                'sizes' => ['Великі'],
                'wicks' => ['Бавовняний'],
                'colors' => ['beige', 'red'],
            ],
            [
                'name' => 'Мило Морозиво',
                'description' => "Ну дуже хочеться з'їсти",
                'price' => 321,
                'image' => 'bodybuttcard.jpg',
                'collections' => ['KIDS'],
                'types' => ['Мило'],
                'aromas' => ['Фрукти'],
                'sizes' => ['Маленькі'],
                'colors' => ['purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Мило Лавандове',
                'description' => 'Вбивай мікробів лавандою',
                'price' => 123,
                'image' => 'bodybuttcard.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Мило'],
                'aromas' => ['Квіти'],
                'sizes' => ['Маленькі'],
                'colors' => ['purple'],
            ],
            [
                'name' => 'Набір Валентинка',
                'description' => 'Спробуй все і одразу',
                'price' => 1919,
                'image' => 'bodybuttcard.jpg',
                'collections' => ['Valentine\'s'],
                'types' => ['Набори'],
                'aromas' => ['Цитрусові', 'Квіти', 'Фрукти', 'Екзотика', 'Кастомні'],
                'sizes' => ['Великі', 'Маленькі'],
                'wicks' => ['Дерев\'яний', 'Бавовняний'],
                'colors' => ['beige', 'pink', 'purple', 'lightgreen', 'red'],
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::firstOrCreate(
                ['name' => $productData['name']],
                array_diff_key($productData, ['types' => '', 'sizes' => '', 'wicks' => '', 'aromas' => '', 'collections' => '', 'colors' => '',])
            );

            if (isset($productData['collections'])) {
                foreach ($productData['collections'] as $collectionName) {
                    if (isset($collections[$collectionName])) {
                        $product->collections()->attach($collections[$collectionName]);
                    }
                }
            }

            if (isset($productData['types'])) {
                foreach ($productData['types'] as $typeName) {
                    if (isset($types[$typeName])) {
                        $product->types()->attach($types[$typeName]);
                    }
                }
            }

            if (isset($productData['aromas'])) {
                foreach ($productData['aromas'] as $aromaName) {
                    if (isset($aromas[$aromaName])) {
                        $product->aromas()->attach($aromas[$aromaName]);
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

            if (isset($productData['wicks'])) {
                foreach ($productData['wicks'] as $wickName) {
                    if (isset($wicks[$wickName])) {
                        $product->wicks()->attach($wicks[$wickName]);
                    }
                }
            }

            if (isset($productData['colors'])) {
                foreach ($productData['colors'] as $colorName) {
                    if (isset($colors[$colorName])) {
                        $product->colors()->attach($colors[$colorName]);
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