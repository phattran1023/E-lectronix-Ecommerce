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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index'])->name('homepage');
Route::get('/collections',[App\Http\Controllers\Frontend\FrontendController::class,'categories']);
Route::get('collections/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'products']);
Route::get('collections/{category_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'productView']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin routes-Phat's routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders','index')->name('sliders.index');
        Route::get('sliders/create','create')->name('sliders.create');
        Route::post('sliders/create','store')->name('sliders.store');
        Route::get('sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('sliders/{slider}/delete', 'delete');

    });

    //Category routes-Phat's route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('categoryIndex');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
    });

    //Product routes-Phat's routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('products', 'index')->name('productIndex');
        Route::get('products/create', 'create')->name('product.create');
        Route::post('products', 'store')->name('product.store');
        Route::get('products/{product}/edit', 'edit')->name('product.edit');
        Route::put('products/{product}', 'update')->name('product.update');
        Route::get('products/{product_id}/delete', 'destroy')->name('product.delete');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage')->name('product.deleteImage');
        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::delete('product-color/{prod_color_id}/delete', 'deleteProdColor')->name('product.deleteColor');
    });

    //Brands routes-Phat's route
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brandIndex');

    //Colors routes-Phat's routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('colors', 'index')->name('colorIndex');
        Route::get('colors/create', 'create')->name('color.create');
        Route::post('colors/create', 'store')->name('color.store');
        Route::get('colors/{color}/edit', 'edit')->name('color.edit');
        Route::put('colors/{color_id}', 'update')->name('color.update');
        Route::get('colors/{color_id}/delete', 'delete')->name('color.delete');
    });
});
