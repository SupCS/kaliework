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
}

