<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/dashboard/posts', function () {
    return view('dashboard.posts.index');
})->name('dashboard.posts.index');

Route::get('/dashboard/posts/create', function () {
    return view('dashboard.posts.create');
})->name('dashboard.posts.create');

Route::get('/dashboard/categories', function () {
    return view('dashboard.categories.index');
})->name('dashboard.categories.index');

Route::get('/dashboard/users', function () {
    return view('dashboard.users.index');
})->name('dashboard.users.index');

Route::get('/dashboard/profile', function () {
    return view('dashboard.profile.index');
})->name('dashboard.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
