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


Route::get('/', [ContactController::class, 'index'])->name('form');

Route::get('/confirm', [ContactController::class, 'confirm'])->name('confirm');

Route::post('/send', [ContactController::class, 'send'])->name('send');


Route::get('/system', [ContactController::class, 'system'])->name('system');

Route::delete('/system/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy');
