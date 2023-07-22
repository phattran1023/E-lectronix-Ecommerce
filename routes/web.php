<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    //Category routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('categoryIndex');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    //Product routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('products', 'index')->name('productIndex');
        Route::get('products/create', 'create')->name('product.create');
        Route::post('products', 'store');

    });

    //Brands routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brandIndex');
});
