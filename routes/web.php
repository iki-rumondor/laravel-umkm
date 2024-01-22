<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
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

Route::get('/',[HomeController::class,'index'])->name('honme');

Route::get('/category/{id}',[HomeController::class,'category'])->name('category');
Route::get('/all-category',[HomeController::class,'category_all'])->name('category.all');

Route::get('/jenis-umkm/{id}',[HomeController::class,'umkm'])->name('umkm');

Route::get('/product/{id}',[HomeController::class,'product'])->name('product');
Route::get('/product',[HomeController::class,'all_product'])->name('product.all');

Route::get('/search',[HomeController::class,'search'])->name('search');

Route::get('/toko/{id}',[HomeController::class,'toko'])->name('toko');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

Route::get('/tentang-kami',[HomeController::class,'about'])->name('about');

Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('slider',SliderController::class);
        Route::resource('setting',SettingController::class);

        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::put('/profile',[ProfileController::class,'update'])->name('profile.update');
        Route::put('/profile-password',[ProfileController::class,'updatePassword'])->name('profile.password');
        Route::resource('user',UserController::class);
    });
});

Route::prefix('fetch')->group(function () {
    Route::get('/shops/{userID}',[FetchController::class,'findShopByUserID']);
});

Route::prefix('users')->group(function () {
    Route::post('status/update',[UserController::class,'updateStatus']);
});

Route::prefix('reports')->group(function () {
    Route::get('umkm',[ReportController::class,'umkm']);
    Route::get('mandiri',[ReportController::class,'mandiri']);
    Route::get('masyarakat',[ReportController::class,'masyarakat']);
    Route::get('usaha',[ReportController::class,'usaha']);
    Route::get('product',[ReportController::class,'product']);
});



