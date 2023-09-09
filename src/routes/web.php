<?php

use App\Models\Category;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\momoController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Auth\socialLoginController;
use App\Http\Controllers\Frontend\CheckoutController;

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

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');


    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');

    Route::get('search','searchProduct');
    Route::get('comingsoon','commingsoon');
});

//comment system - Tien's route
Route::post('collections/comment',[App\Http\Controllers\Frontend\CommentController::class,'store']);
Route::delete('/delete-comment/{comment}', [App\Http\Controllers\Frontend\CommentController::class, 'destroy'])->name('delete-comment');
Route::get('takeCommentInfor',[App\Http\Controllers\Frontend\CommentController::class,'index']);
Route::get('show-user',[App\Http\Controllers\Frontend\CommentController::class,'show']);
Route::post('commitReport/{commentId}',[App\Http\Controllers\Frontend\ReportedComment::class,'store'])->name('storeReportComment');
Route::get('collections/comment',[App\Http\Controllers\Frontend\CommentController::class,'earliestComment']);
Route::get('collections/comment', 'YourController@yourControllerMethod');
Route::post('/comment/{comment}/like',[App\Http\Controllers\Frontend\CommentController::class,'likeBtn'])->name('comment.like');
Route::post('/reply/{reply}/like', [App\Http\Controllers\Frontend\ReplyController::class,'likeBtn'])->name('reply.like');
Route::post('replyComment/{id}', [App\Http\Controllers\Frontend\ReplyController::class, 'commentReplyStore'])->name('reply.store');
Route::post('replyReplyComment/{replyId}/{commentId}', [App\Http\Controllers\Frontend\ReplyController::class, 'replyReplyStore'])->name('replyReply.store');
Route::post('/delete-replies/{id}',[App\Http\Controllers\Frontend\ReplyController::class, 'deleteReply'])->name('reply.delete');
// User's routes  - Phat's routes
Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile',[App\Http\Controllers\Frontend\UserController::class, 'updateUser']);

    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordChange']);

});

Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);
Route::get('/payment/callback',[CheckoutController::class,'callbackMomo'])->name('paymentCallback');
Route::get('/payment/callbackQR',[CheckoutController::class,'callbackMomoQR'])->name('paymentCallbackQR');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login with social account- Tai's routes
Route::get('login/google', [socialLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [socialLoginController::class, 'handleGoogleCallback']);
Route::get('login/twitter', [socialLoginController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('login/twitter/callback', [socialLoginController::class, 'handleTwitterCallback']);

//Coupon user- Tai's routes
Route::get('coupon/user', [CouponController::class, 'couponUser'])->name('coupon.couponUser');
Route::get('survey', [SurveyController::class, 'survey'])->name('survey.survey');
Route::post('survey/submit', [SurveyController::class, 'surveySubmit'])->name('survey.submit');

//Coupon - checkout
Route::post('coupon/add/', [CheckoutController::class, 'addCoupon'])->name('coupon.addCoupon');

// Admin routes-Phat's routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index','getOrdersChartData'])->name('dashboard');

    Route::get('settings',[App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class,'store']);

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders', 'index')->name('sliders.index');
        Route::get('sliders/create', 'create')->name('sliders.create');
        Route::post('sliders/create', 'store')->name('sliders.store');
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
        Route::put('products/{product_id}', 'update')->name('product.update');
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

    //Orders-admin routes-Phat's routes
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');


        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
    });

    // Users-admin routes-Phat's routes
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('users','store');
        Route::get('users/{user_id}/edit','edit');
        Route::put('users/{user_id}','update');
        Route::get('users/{user_id}/delete','delete');
    });
    //Comments-admin routes-Tien's routes
    Route::controller(App\Http\Controllers\Admin\ReportedComment::class)->group(function () {
        Route::get('/comments', 'indexAdmin');
        Route::get('comments/{id}/edit','edit');
        Route::get('/comments/index','index');
        Route::get('/comments/{reportId}/delete','delete');
    });
    //Coupon-admin routes-Tai's routes
    Route::controller(App\Http\Controllers\CouponController::class)->group(function () {
        Route::get('coupon','index')->name('coupon.index');
        Route::post('coupon/search','search')->name('coupon.search');
        Route::get('coupon/add','add')->name('coupon.add');
        Route::post('coupon/store','store')->name('coupon.store');
        Route::get('coupon/edit/{coupon}','edit')->name('coupon.edit');
        Route::put('coupon/update/{coupon}','update')->name('coupon.update');
        Route::get('coupon/{id}','delete')->name('coupon.delete');
        Route::get('coupon/get','getRandomCoupon')->name('coupon.getRandomCoupon');
        Route::post('coupon/send/','send')->name('coupon.send');
        Route::post('coupon/sendToAll','sendToAll')->name('coupon.sendToAll');
        Route::post('coupon/sendToSurvey','sendToSurvey')->name('coupon.sendToSurvey');
        Route::post('coupon/deleteCouponExpired','deleteCouponExpired')->name('coupon.deleteCouponExpired');
    });
    Route::controller(App\Http\Controllers\SurveyController::class)->group(function () {
        Route::get('survey','index')->name('survey.index');
        Route::get('survey/add','add')->name('survey.add');
        Route::post('survey/store','store')->name('survey.store');
        Route::get('survey/edit/{id}','edit')->name('survey.edit');
        Route::put('survey/update','update')->name('survey.update');
        Route::get('survey/{id}','delete')->name('survey.delete');
    });
});
