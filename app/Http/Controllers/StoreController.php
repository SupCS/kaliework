<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Models\Collection;
use App\Models\Aroma;
use App\Models\Size;
use App\Models\Wick;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query', null);
        $selectedTypes = $request->input('types', []);
        $selectedCollections = $request->input('collections', []);
        $selectedAromas = $request->input('aromas', []);
        $selectedSizes = $request->input('sizes', []);
        $selectedWicks = $request->input('wicks', []);
        $priceMin = $request->input('price_min', 0);
        $priceMax = $request->input('price_max', 5000);

        // Если выбран фильтр "Всі" для типа товара, игнорируем все остальные выбранные типы товаров
        if (in_array('all', $selectedTypes)) {
            $selectedTypes = ['all'];
        }

        $products = Product::with('image', 'types', 'colors')
            ->whereBetween('price', [$priceMin, $priceMax])
            ->when($query, function ($queryBuilder, $query) {
                return $queryBuilder->where('name', 'like', '%' . $query . '%');
            })
            ->when($selectedTypes, function ($query, $selectedTypes) {
                if ($selectedTypes[0] === 'all') {
                    // Если выбран фильтр "Всі" для типа товара, не применяем фильтрацию по типу товара
                    return $query;
                } else {
                    return $query->whereHas('types', function ($query) use ($selectedTypes) {
                        $query->whereIn('type_id', $selectedTypes);
                    });
                }
            })
            ->when($selectedCollections, function ($query, $selectedCollections) {
                if (in_array('all', $selectedCollections)) {
                    // Если выбран фильтр "Всі" для свойства "Collection", не применяем фильтрацию по свойству "Collection"
                    return $query;
                } else {
                    return $query->whereHas('collections', function ($query) use ($selectedCollections) {
                        $query->whereIn('collection_id', $selectedCollections);
                    });
                }
            })
            ->when($selectedAromas, function ($query, $selectedAromas) {
                if (in_array('all', $selectedAromas)) {
                    return $query;
                } else {
                    return $query->whereHas('aromas', function ($query) use ($selectedAromas) {
                        $query->whereIn('aroma_id', $selectedAromas);
                    });
                }
            })
            ->when($selectedSizes, function ($query, $selectedSizes) {
                if (in_array('all', $selectedSizes)) {
                    return $query;
                } else {
                    return $query->whereHas('sizes', function ($query) use ($selectedSizes) {
                        $query->whereIn('size_id', $selectedSizes);
                    });
                }
            })
            ->when($selectedWicks, function ($query, $selectedWicks) {
                if (in_array('all', $selectedWicks)) {
                    return $query;
                } else {
                    return $query->whereHas('wicks', function ($query) use ($selectedWicks) {
                        $query->whereIn('wick_id', $selectedWicks);
                    });
                }
            })
            ->get();

        $types = Type::all();
        $collections = Collection::all();
        $aromas = Aroma::all();
        $sizes = Size::all();
        $wicks = Wick::all();

        return view('store', compact('query', 'products', 'types', 'selectedTypes', 'collections', 'selectedCollections', 'aromas', 'selectedAromas', 'sizes', 'selectedSizes', 'wicks', 'selectedWicks'));
    }

    public function showProduct($id)
    {
        $product = Product::with('image')->find($id);

        // Проверка, найден ли товар
        if ($product === null) {
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