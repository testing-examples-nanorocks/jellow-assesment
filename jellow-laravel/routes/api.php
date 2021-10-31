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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('users', [\App\Http\Controllers\UserController::class, 'filterUsers'])->name('users.filterUsers');

Route::get('users/{userId}', [\App\Http\Controllers\UserController::class, 'details'])->name('users.details');

Route::get('users/{userId}/albums', [\App\Http\Controllers\UserController::class, 'filterAlbums'])->name('users.filterAlbums');

Route::get('users/{userId}/albums/favorite', [\App\Http\Controllers\UserController::class, 'showFavoriteAlbums'])->name('users.showFavoriteAlbums');

Route::post('users/{userId}/albums/{albumId}/favorite', [\App\Http\Controllers\UserController::class, 'addFavoriteAlbum'])->name('users.addFavoriteAlbum')->middleware(\App\Http\Middleware\FavoriteAlbum::class);

Route::delete('users/{userId}/albums/{albumId}/favorite', [\App\Http\Controllers\UserController::class, 'removeFavoriteAlbum'])->name('users.removeFavoriteAlbum');

Route::get('users/{userId}/posts/{limit}', [\App\Http\Controllers\UserController::class, 'chunkPosts'])->name('users.chunkPosts');

Route::get('users/{userId}/todoes', [\App\Http\Controllers\UserController::class, 'toDoes'])->name('users.toDoes');

Route::put('users/{userId}/todoes/{todoId}', [\App\Http\Controllers\UserController::class, 'toDoComplete'])->name('users.toDoComplete');
