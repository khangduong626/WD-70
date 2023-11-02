<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboards;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdcutController;


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
Route::get('/category', [CategoryController::class,'index'])->name('category');