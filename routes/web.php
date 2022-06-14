<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PharmacyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/products');
});
Route::get('products/search',[ProductController::class,'search'])->name('products.search');
Route::resource('/products', ProductController::class);

Route::get('pharmacies/search', [PharmacyController::class, 'search'])->name('pharmacies.search');
Route::resource('/pharmacies', PharmacyController::class);
