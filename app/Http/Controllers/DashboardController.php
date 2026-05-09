<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::when(auth()->user()->role !== 'admin', function($query) {
            $query->where('user_id', auth()->id());
        })->count();

        $totalCategories = Category::count();

        $recentPosts = Post::with(['user', 'category'])
            ->when(auth()->user()->role !== 'admin', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('totalPosts', 'totalCategories', 'recentPosts'));
    }
}
