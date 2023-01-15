<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {

    Route::prefix('auth')->group(function () {
        Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
        Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
        Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
        Route::post('me', [\App\Http\Controllers\AuthController::class, 'me'])->name('me');
    });

    Route::put('products/restore/{id}', [App\Http\Controllers\ProductController::class, 'restore'])->name('products.restore');
    Route::get('products/restoreall', [App\Http\Controllers\ProductController::class, 'restoreAll'])->name('products.restoreAll');
    Route::resource('products', App\Http\Controllers\ProductController::class);

});


