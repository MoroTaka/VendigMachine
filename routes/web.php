<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',[ProductController::class, 'getLogin'])->name('getLogin');

Route::post('/',[ProductController::class, 'postLogin'])->name('postLogin');

Route::get('/newAccount',[ProductController::class, 'newAccount'])->name('newAccount');

Route::post('/newAccount',[ProductController::class, 'newAccountAdd'])->name('newAccountAdd');

Route::get('/index' ,[ProductController::class, 'index'])->name('index');  // 　一覧画面

Route::get('/search' ,[ProductController::class, 'search'])->name('product.search'); //　検索後

Route::post('/search' ,[ProductController::class, 'search'])->name('product.search'); //　検索

Route::get('/create' ,[ProductController::class, 'create'])->name('product.create'); //　新規登録画面

Route::post('/store' ,[ProductController::class, 'store'])->name('product.store'); //　新規登録

Route::get('/show/{id}' ,[ProductController::class, 'show'])->name('product.show'); //　詳細画面

Route::get('/edit/{id}' ,[ProductController::class, 'edit'])->name('product.edit'); //　編集画面

Route::put('/update' ,[ProductController::class, 'update'])->name('product.update'); //　更新

Route::post('/destroy/{id}' ,[ProductController::class, 'destroy'])->name('product.destroy'); //　削除






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
