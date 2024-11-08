<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/auth', [UserController::class, 'authen'])->name('auth');

Route::get('/products.json', [ProductController::class, 'all_products']);
Route::get('/products/{gtin}.json', [ProductController::class, 'show_product']);
Route::get('/products.json/{keyword}', [ProductController::class, 'query_product']);

Route::get('/gtin', [ProductController::class, 'show_gtin']);
Route::post('/gtin/check', [ProductController::class, 'check_gtin'])->name('gtin.check');

Route::middleware('isadmin')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/company', [CompanyController::class, 'show'])->name('company');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::get('/company/{id}/hide', [CompanyController::class, 'hide_company'])->name('company.hide');
    Route::get('/product/{gtin}', [ProductController::class, 'show'])->name('product');
    Route::get('/product/{gtin}/hide', [ProductController::class, 'hide_product'])->name('product.hide');
    Route::get('/product/{gtin}/delete', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('products/new', [ProductController::class, 'create'])->name('product.create');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/{gtin}/image/delete', [ProductController::class, 'delete_image'])->name('product.image.delete');

    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/{gtin}/image/update', [ProductController::class, 'update_image'])->name('product.image.update');

    Route::put('/company/{id}', [CompanyController::class, 'update'])->name('company.update');
});
