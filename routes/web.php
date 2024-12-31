<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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

// Route::get('/', );

Route::resource('/',FrontController::class);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'registerAction']);
Route::post('/login',[UserController::class,'loginAction']);
Route::get('/logout',[UserController::class,'logout']);

Route::resource('/cart',CartController::class);

// Route::middleware('auth')->prefix('dashboard')group(function () {
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('/transaksi',TransaksiController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/collection', CollectionController::class);
    Route::resource('/user', UserController::class);
    Route::get('/', [HomeController::class,'home']);
    Route::get('/profile', [HomeController::class,'profile']);
});
