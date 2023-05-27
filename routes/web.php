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


Route::post('/contacts', function (\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'question' => 'required',
    ]);

    \Illuminate\Support\Facades\Mail::to('di.syp4ik@gmail.com')->send(new \App\Mail\ContactFormMail($data));

    return redirect('/contacts')->with('success', 'Форма успешно отправлена!');
});
