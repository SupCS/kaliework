<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/adress', function () {
    return view('adress');
})->name('adress');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/product', function () {
    return view('product');
})->name('product');


use App\Http\Controllers\FormProcessController;

Route::post('/process_form', [FormProcessController::class, 'processForm'])->name('form.process');
