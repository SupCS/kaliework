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

        $aromaNames = ['Немає', 'Цитрусові', 'Квіти', 'Фрукти', 'Екзотика', 'Кастомні', 'Сандал', 'Ваніль'];
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

        $colorNames = ['beige', 'pink', 'purple', 'lightgreen', 'red', 'orange'];
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
                'long_description' => 'свічка жіночого тіла, що ідеально передає його красу, елегантність та винтонченість. Свічка має 3 аромати на вибір, або може не мати його взагалі. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 40,
                'weight' => 800,
                'image' => 'bodycard.jpg',
                'collections' => ['Body'],
                'types' => ['Свічки'],
                'aromas' => ['Немає', 'Квіти', 'Цитрусові'],
                'sizes' => ['Великі'],
                'wicks' => ['Дерев\'яний', 'Бавовняний'],
                'colors' => ['beige', 'pink', 'purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Свічка Body Man',
                'description' => 'У 3 ароматах на вибір',
                'price' => 820,
                'long_description' => 'свічка чоловічого, що ідеально передає його красу, мужність та міцність. Свічка має 3 аромати на вибір, або може не мати його взагалі. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 40,
                'weight' => 800,
                'image' => 'bodymancard.jpg',
                'collections' => ['Body'],
                'types' => ['Свічки'],
                'aromas' => ['Немає', 'Квіти', 'Цитрусові'],
                'sizes' => ['Великі'],
                'wicks' => ['Дерев\'яний', 'Бавовняний'],
                'colors' => ['beige', 'pink', 'purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Свічка Body Butt',
                'description' => 'Пахне краще, ніж виглядає',
                'price' => 420,
                'long_description' => 'просто фічка у формі жопки. Свічка має 3 аромати на вибір, або може не мати його взагалі. Час горіння: до 2 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
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
                'price' => 150,
                'long_description' => 'Дуже смачненьке на вигляд мило, яким можна привабити свої дітей до миття рук',
                'ingridients' => 'Вода, гліцерин, масла',
                'height' => 10,
                'weight' => 100,
                'image' => 'soapicecream.jpg',
                'collections' => ['KIDS'],
                'types' => ['Мило'],
                'aromas' => ['Фрукти'],
                'sizes' => ['Маленькі'],
                'colors' => ['purple', 'lightgreen', 'red'],
            ],
            [
                'name' => 'Мило Лавандове',
                'description' => 'Вбивай мікробів лавандою',
                'price' => 150,
                'long_description' => 'мило з запахом лавандового поля',
                'ingridients' => 'Вода, гліцерин, масла',
                'height' => 10,
                'weight' => 100,
                'image' => 'soaplavanda.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Мило'],
                'aromas' => ['Квіти'],
                'sizes' => ['Маленькі'],
                'colors' => ['purple'],
            ],
            [
                'name' => 'Свічка сандал',
                'description' => 'Найкраще заспокійливе',
                'price' => 300,
                'long_description' => 'найкращий вибір для надання приємного аромату особистій кімнаті або робочому місцю. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
                'image' => 'candlesandal.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Свічки'],
                'aromas' => ['Сандал'],
                'sizes' => ['Маленькі'],
                'wicks' => ['Бавовняний', 'Дерев\'яний'],
                'colors' => ['purple'],
            ],
            [
                'name' => 'Свічка цитрус',
                'description' => 'Смачна апельсинка',
                'price' => 300,
                'long_description' => 'найкращий вибір для надання приємного аромату особистій кімнаті або робочому місцю. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
                'image' => 'candlecitrus.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Свічки'],
                'aromas' => ['Цитрусові'],
                'sizes' => ['Маленькі'],
                'wicks' => ['Бавовняний', 'Дерев\'яний'],
                'colors' => ['orange', 'beige', 'red'],
            ],
            [
                'name' => 'Свічка яблуко',
                'description' => 'Смачне яблучко',
                'price' => 300,
                'long_description' => 'найкращий вибір для надання приємного аромату особистій кімнаті або робочому місцю. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
                'image' => 'candleapple.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Свічки'],
                'aromas' => ['Фрукти'],
                'sizes' => ['Маленькі'],
                'wicks' => ['Бавовняний', 'Дерев\'яний'],
                'colors' => ['lightgreen', 'orange', 'beige', 'red'],
            ],
            [
                'name' => 'Свічка ваніль',
                'description' => 'Солодкий аромат ванілі',
                'price' => 300,
                'long_description' => 'найкращий вибір для надання приємного аромату особистій кімнаті або робочому місцю. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
                'image' => 'candleapple.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Свічки'],
                'aromas' => ['Ваніль'],
                'sizes' => ['Маленькі'],
                'wicks' => ['Бавовняний', 'Дерев\'яний'],
                'colors' => ['beige', 'orange'],
            ],
            [
                'name' => 'Свічка лаванда',
                'description' => 'Приємний лавандовий аромат',
                'price' => 300,
                'long_description' => 'найкращий вибір для надання приємного аромату особистій кімнаті або робочому місцю. Час горіння: до 4 годин',
                'ingridients' => 'Віск, натуральні ароматизатори (при виборі запаху)',
                'height' => 20,
                'weight' => 400,
                'image' => 'candlelavanda.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Свічки'],
                'aromas' => ['Квіти'],
                'sizes' => ['Маленькі'],
                'wicks' => ['Бавовняний', 'Дерев\'яний'],
                'colors' => ['purple'],
            ],
            [
                'name' => 'Мило лаймове',
                'description' => 'Вбивай мікробів лаймом',
                'price' => 150,
                'long_description' => 'мило з запахом соковитого лайму',
                'ingridients' => 'Вода, гліцерин, масла',
                'height' => 10,
                'weight' => 100,
                'image' => 'soaplime.jpg',
                'collections' => ['HOUSE'],
                'types' => ['Мило'],
                'aromas' => ['Цитрусові'],
                'sizes' => ['Маленькі'],
                'colors' => ['lightgreen'],
            ],
            [
                'name' => 'Набір Валентинка',
                'description' => 'Спробуй все і одразу',
                'price' => 1919,
                'long_description' => 'всіх видів мила та свічок потрошку. Якщо ви обираєте колір - він буде надаватися всім свічкам, де є можливість створити їх вашим кольором',
                'weight' => 2000,
                'image' => 'kitvalentines.jpg',
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