<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/product/insert', [App\Http\Controllers\ProductController::class,"create"])->middleware(['auth', 'verified'])->name('product.insert');
Route::post('/product/sell', [App\Http\Controllers\ProductController::class,"sellamount"])->middleware(['auth', 'verified'])->name('product.sell');
Route::post('/product/buy', [App\Http\Controllers\ProductController::class,"buyamount"])->middleware(['auth', 'verified'])->name('product.buy');

Route::middleware('auth')->group(function () {

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
