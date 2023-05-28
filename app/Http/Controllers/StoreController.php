<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $selectedTypes = $request->input('types', []);

        $products = Product::with('image', 'types')
            ->when($selectedTypes, function ($query, $selectedTypes) {
                if ($selectedTypes[0] === 'all') {
                    // Если выбран фильтр "Всі", не применяем фильтрацию по типу товара
                    return $query;     
                } else { return $query->whereHas('types', function ($query) use ($selectedTypes) {
                    $query->whereIn('name', $selectedTypes);
                });
                }
            })
            ->get('*');

        $types = Type::all();

        return view('store', compact('products', 'types', 'selectedTypes'));
    }

    public function showProduct($id)
    {
        $product = Product::with('image')->find($id);

        // Проверка, найден ли товар
        if($product === null) {
            return redirect('/store');
        }

        // Получить 4 случайных продукта
        $otherProducts = Product::with('image')->inRandomOrder()->take(4)->get();

        $imageName = pathinfo($product->image, PATHINFO_FILENAME); // Получить имя файла изображения без расширения
        $bigImageName = $imageName . 'big.jpg'; // Добавить префикс "big" к имени файла
        $product->bigImage = $bigImageName; // Добавить свойство "bigImage" с именем увеличенного изображения

        return view('product', ['product' => $product, 'otherProducts' => $otherProducts]);
    }
}