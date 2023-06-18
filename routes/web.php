<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FavoritesController;

Route::get('/register', [AuthController::class, 'registerPage'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('/home', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index')->middleware('auth');
Route::post('/posts/{id}/favorite', [FavoritesController::class, 'add'])->name('posts.favorite.add')->middleware('auth');
Route::post('/posts/{id}/unfavorite', [FavoritesController::class, 'remove'])->name('posts.favorite.remove')->middleware('auth');