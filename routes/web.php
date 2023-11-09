<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboards;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;

use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;




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

Route::get('/home',[Dashboards::class,"index"])->name('dashboards');


Route::prefix('/product')->name('product.')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/store',[ProductController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[ProductController::class,'delete'])->name('delete');

});
Route::prefix('/productdetail')->name('productdetail.')->group(function(){
    Route::get('/{id}',[ProductDetailController::class,'index'])->name('index');
    Route::get('/create/{id}',[ProductDetailController::class,'create'])->name('create');
    Route::post('/store',[ProductDetailController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ProductDetailController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[ProductDetailController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[ProductDetailController::class,'delete'])->name('delete');

});
Route::prefix('/category')->name('category.')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[CategoryController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('delete');





});
Route::prefix('/color')->name('color.')->group(function(){
    Route::get('/',[ColorController::class,'index'])->name('index');
    Route::get('/create',[ColorController::class,'create'])->name('create');
    Route::post('/store',[ColorController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ColorController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[ColorController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[ColorController::class,'delete'])->name('delete');
});
Route::prefix('/brand')->name('brand.')->group(function(){
    Route::get('/',[BrandController::class,'index'])->name('index');
    Route::get('/create',[BrandController::class,'create'])->name('create');
    Route::post('/store',[BrandController::class,'store'])->name('store');
    Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[BrandController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[BrandController::class,'delete'])->name('delete');

});
Route::prefix('/size')->name('size.')->group(function(){
    Route::get('/',[SizeController::class,'index'])->name('index');
    Route::get('/create',[SizeController::class,'create'])->name('create');
    Route::post('/store',[SizeController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SizeController::class,'edit'])->name('edit');
    Route::put('/update/{id}',[SizeController::class,'update'])->name('update');
    Route::delete('/delete/{id}',[SizeController::class,'delete'])->name('delete');

});

