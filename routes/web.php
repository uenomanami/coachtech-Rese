<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
Route::get('/search', [StoreController::class, 'search']);

Route::post('/favorite', [FavoriteController::class, 'create'])->name('favorite');
Route::post('/favorite/delete', [FavoriteController::class, 'delete'])->name('favorite.delete');

Route::prefix('detail')->group(function () {
    Route::get('', [StoreController::class, 'detail']);

    Route::prefix('reserve')->group(function () {
        Route::post('', [ReserveController::class, 'create'])->name('reserve');
        Route::post('delete', [ReserveController::class, 'delete'])->name('reserve.delete');
        Route::post('update', [ReserveController::class, 'update'])->name('reserve.update');
    });

    Route::post('comment', [CommentController::class, 'create'])->name('comment');
});

Route::get('/mypage', [UserController::class, 'mypage'])->middleware('auth');;

Route::get('/thanks', function () {
    return view('thanks');
});

// Route::get('/register', function () {
//     return view('register');
// })->middleware(['auth'])->name('register');

require __DIR__ . '/auth.php';
