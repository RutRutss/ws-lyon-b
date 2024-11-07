<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('isadmin')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/company', [CompanyController::class, 'show'])->name('company');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::get('/company/{id}/hide', [CompanyController::class, 'hide_company'])->name('company.hide');
    Route::get('/product/{gtin}', [ProductController::class, 'show'])->name('product');
    Route::get('/product/{gtin}/hide', [ProductController::class, 'hide_product'])->name('product.hide');
    Route::get('/product/{gtin}/delete', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

    Route::put('/company/{id}', [CompanyController::class, 'update'])->name('company.update');
});
