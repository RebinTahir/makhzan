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

Route::get('/product/insert', [App\Http\Controllers\ProductController::class,"create"])->middleware(['auth', 'verified'])->name('product.insert');
Route::get('/product/sell', [App\Http\Controllers\ProductController::class,"sellamount"])->middleware(['auth', 'verified'])->name('product.sell');
Route::get('/product/buy', [App\Http\Controllers\ProductController::class,"buyamount"])->middleware(['auth', 'verified'])->name('product.buy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
