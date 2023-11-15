<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductDetail;
use App\Http\Controllers\Api\HomeController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/category/{id}',[HomeController::class,'fillterWithCategory'])->name('fillterWithCategory');


Route::get('/product',[ProductController::class,'index'])->name('product');
Route::get('/productdetail/{id}',[ProductDetail::class,'index'])->name('productsdetail');
