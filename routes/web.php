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
Route::get('/favorite', [FavoriteController::class, 'create']);
Route::get('/favorite/delete', [FavoriteController::class, 'delete']);
Route::get('/detail/reserve', [ReserveController::class, 'create']);
Route::get('/detail/reserve/delete', [ReserveController::class, 'delete']);

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
