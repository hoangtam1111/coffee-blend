<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EvaluteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\UserController;
use App\Models\Cart;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/services', [HomeController::class,'services'])->name('services');
Route::get('/product-single/{id}', [HomeController::class,'detail'])->name('product-single');

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'storeLogin'])->name('storeLogin');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'storeRegister'])->name('storeRegister');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/menu', [ProductController::class,'menu'])->name('menu');
Route::prefix('cart')->name('cart.')->group(function (){
    Route::get('/', [CartController::class,'index'])->name('index');
    Route::post('/addCart',[CartController::class,'addCart'])->name('add-cart');
    Route::get('/deleteCart/{id}',[CartController::class,'deleteCart'])->name('delete-cart');
});
Route::get('/checkout', function (){
    return view('checkout');
})->name('checkout');

Route::post('/addBooking',[BookingController::class,'addBooking'])->name('addBooking');

Route::prefix('evalute')->name('evalute.')->group(function (){
    Route::get('/contact', [HomeController::class,'contact'])->name('index');
    Route::post('/addEvalute', [EvaluteController::class,'addEvalute'])->name('addEvalute');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::prefix('booking')->name('booking.')->group(function(){
        Route::get('/',[BookingController::class,'index'])->name('index');
        Route::get('/insert',[BookingController::class,'insert'])->name('insert');
        Route::post('/insert',[BookingController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[BookingController::class,'update'])->name('update');
        Route::post('/update/{id}',[BookingController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[BookingController::class,'delete'])->name('delete');
    });
    Route::prefix('evalute')->name('evalute.')->group(function (){
        Route::get('/',[EvaluteController::class,'index'])->name('index');
        Route::get('/insert',[EvaluteController::class,'insert'])->name('insert');
        Route::post('/insert',[EvaluteController::class,'postInsert'])->name('post-insert');
        Route::get('/update',[EvaluteController::class,'update'])->name('update');
        Route::post('/update',[EvaluteController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[EvaluteController::class,'delete'])->name('delete');
    });
    Route::prefix('product')->name('product.')->group(function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/detail/{id}',[ProductController::class,'detail'])->name('detail');
        Route::get('/insert',[ProductController::class,'insert'])->name('insert');
        Route::post('/insert',[ProductController::class,'postInsert'])->name('post-insert');
        Route::get('/update',[ProductController::class,'update'])->name('update');
        Route::post('/update',[ProductController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');
    });
    Route::prefix('type')->name('type.')->group(function (){
        Route::get('/',[ProductTypeController::class,'index'])->name('index');
        Route::get('/insert',[ProductTypeController::class,'insert'])->name('insert');
        Route::post('/insert',[ProductTypeController::class,'postInsert'])->name('post-insert');
        Route::get('/update',[ProductTypeController::class,'update'])->name('update');
        Route::post('/update',[ProductTypeController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[ProductTypeController::class,'delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/insert',[UserController::class,'insert'])->name('insert');
        Route::post('/insert',[UserController::class,'postInsert'])->name('post-insert');
        Route::get('/update',[UserController::class,'update'])->name('update');
        Route::post('/update',[UserController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
    });
    Route::prefix('order')->name('order.')->group(function (){
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::get('/detail/{id}',[OrderController::class,'detail'])->name('detail');
        Route::get('/insert',[OrderController::class,'insert'])->name('insert');
        Route::post('/insert',[OrderController::class,'postInsert'])->name('post-insert');
        Route::get('/update',[OrderController::class,'update'])->name('update');
        Route::post('/update',[OrderController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[OrderController::class,'delete'])->name('delete');
    });
});
