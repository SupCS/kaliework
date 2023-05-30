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
        // Получение параметров фильтрации из запроса
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

        // Запрос на получение товаров с учетом фильтров
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

        // Получение всех доступных типов, коллекций, ароматов, размеров и фитилей
        $types = Type::all();
        $collections = Collection::all();
        $aromas = Aroma::all();
        $sizes = Size::all();
        $wicks = Wick::all();

        // Передача данных в представление "store.blade.php"
        return view('store', compact(
            'query',
            'products',
            'types',
            'selectedTypes',
            'collections',
            'selectedCollections',
            'aromas',
            'selectedAromas',
            'sizes',
            'selectedSizes',
            'wicks',
            'selectedWicks'
        ));
    }

    // Отображает страницу с информацией о товаре.
    public function showProduct($id)
    {
        // Поиск товара по идентификатору
        $product = Product::with('image')->find($id);

        // Проверка, найден ли товар
        if ($product === null) {
            return redirect('/store');
        }

        // Получение 4 случайных товаров для отображения в разделе "Інші товари"
        $otherProducts = Product::with('image')->inRandomOrder()->take(4)->get();

        // Формирование имени большого изображения товара для страницы продукта
        $imageName = pathinfo($product->image, PATHINFO_FILENAME);
        $bigImageName = $imageName . 'big.jpg';
        $product->bigImage = $bigImageName;

        // Передача данных в представление "product.blade.php"
        return view('product', ['product' => $product, 'otherProducts' => $otherProducts]);
    }
}