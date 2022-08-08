<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;

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

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/product-details/{id}', [FrontController::class, 'productDetails'])->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home.home');
    })->name('dashboard');
    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
    Route::post('/new-product', [ProductController::class, 'newProduct'])->name('new-product');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
});
