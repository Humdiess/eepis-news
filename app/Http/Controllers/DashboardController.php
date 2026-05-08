<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $totalCategories = Category::count();

        $recentPosts = Post::with(['user', 'category'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('totalPosts', 'totalCategories', 'recentPosts'));
    }
}
