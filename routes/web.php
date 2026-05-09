<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{post:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/kategori/{category:slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/posts', [PostController::class, 'index'])->name('dashboard.posts.index');

Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');

Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');

Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users.index');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

});

require __DIR__ . '/auth.php';
