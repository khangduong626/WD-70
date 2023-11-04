<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboards;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdcutController;
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
    Route::get('/',[ProdcutController::class,'index'])->name('index');

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
});
Route::prefix('/brand')->name('brand.')->group(function(){
    Route::get('/',[BrandController::class,'index'])->name('index');
});
Route::prefix('/size')->name('size.')->group(function(){
    Route::get('/',[SizeController::class,'index'])->name('index');
});

