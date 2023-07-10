<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ProductsController;

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
    return redirect()->route('products.create');
});

// Route::get('/teste', [TesteController::class, 'index']);
// Route::post('/teste/create', [TesteController::class, 'store'])->name('register');

Route::prefix('products')->name('products.')->group(function(){
    Route::get('/', [ProductsController::class, 'create'])->name('create');
    Route::post('/create', [ProductsController::class, 'store'])->name('store');
    Route::get('/showAll', [ProductsController::class, 'index'])->name('showAll');
    Route::delete('/{id}', [ProductsController::class, 'destroy'])->name('destroy');
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('update');

    // Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
});
