<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('news.index');
});

Route::get('/berita/detail', function () {
    return view('news.show');
});

Route::get('/kategori', function () {
    return view('news.category');
});

Route::get('/search', function () {
    return view('news.search');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/posts', [PostController::class, 'index'])->name('dashboard.posts.index');

Route::get('/dashboard/posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');

Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');

Route::get('/dashboard/users', [UserController::class, 'index'])->name('dashboard.users.index');

Route::get('/dashboard/profile', function () {
    return view('dashboard.profile.index');
})->name('dashboard.profile');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
