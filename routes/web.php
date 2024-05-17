<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/showList', [App\Http\Controllers\ProductController::class, 'showList'])->name('showList');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/regist',[App\Http\Controllers\ProductController::class, 'regist'])->name('regist');

//登録処理

Route::post('/store',[App\Http\Controllers\ProductController::class, 'store'])->name('store');

//購入手続きボタン
Route::get('/purchase/{id}',[App\Http\Controllers\ProductController::class, 'purchase'])->name('purchase');

//検索処理
Route::get('/search',[App\Http\Controllers\ProductController::class, 'search'])->name('search');

//購入処理
Route::post('/purchase/{id}', [App\Http\Controllers\ProductController::class, 'purchaseStore'])->name('purchase.store');

//削除ボタン
Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class, 'delete'])->name('delete');
