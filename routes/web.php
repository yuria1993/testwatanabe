<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\ContactController;

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

//問い合わせ画面遷移
Route::get('/', [ContactController::class, 'index'])->name('form');
//確認画面遷移
Route::get('/confirm', [ContactController::class, 'confirm'])->name('confirm');
//問い合わせ登録
Route::post('/send', [ContactController::class, 'send'])->name('send');

//一覧画面遷移/検索処理
Route::get('/system', [ContactController::class, 'system'])->name('system');
//問い合わせ削除処理
Route::delete('/system/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy');
