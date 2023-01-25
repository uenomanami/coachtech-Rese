<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;

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

Route::get('/', [StoreController::class, 'index']);
Route::get('/detail', [StoreController::class, 'detail']);
Route::post('/favorite', [FavoriteController::class, 'create'])->name('favorite');
Route::post('/favorite/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');
Route::post('/detail/reserve', [ReserveController::class, 'create'])->name('reserve');
Route::post('/detail/reserve/delete', [ReserveController::class, 'delete'])->name('reserve.delete');
Route::get('/search', [StoreController::class, 'search']);
Route::get('/mypage', [USerController::class, 'mypage']);

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
