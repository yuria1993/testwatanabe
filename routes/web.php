<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestsController;

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

Route::get('/', [TestsController::class, 'index'])->name('form');

Route::get('/confirm', [TestsController::class, 'confirm'])->name('confirm');
Route::post('/confirm', [TestsController::class, 'confirm'])->name('confirm');
Route::get('/send', [TestsController::class, 'send'])->name('send');

Route::post('/send', [TestsController::class, 'send'])->name('send');
Route::get('/system', [TestsController::class, 'system'])->name('system');
Route::post('/system', [TestsController::class, 'system'])->name('system');
Route::get('search', [TestsController::class, 'search'])->name('search');
Route::post('search', [TestsController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
