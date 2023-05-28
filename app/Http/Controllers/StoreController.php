<?php

namespace App\Http\Controllers;

use App\Models\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::with('image')->get();

        return view('store', ['products' => $products]);
    }

    public function showProduct($id)
{
    $product = Product::with('image')->find($id);

    // Проверка, найден ли товар
    if($product === null) {
        return redirect('/store');
    }

    $imageName = pathinfo($product->image, PATHINFO_FILENAME); // Получить имя файла изображения без расширения
    $bigImageName = $imageName . 'big.jpg'; // Добавить префикс "big" к имени файла
    $product->bigImage = $bigImageName; // Добавить свойство "bigImage" с именем увеличенного изображения

    return view('product', ['product' => $product]);
}
}