<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Homepage: hero (latest), berita terbaru, trending, kategori sidebar
     */
    public function index()
    {
        $hero = Post::with(['user', 'category'])->latest()->first();

        $latestNews = Post::with(['user', 'category'])
            ->when($hero, fn($q) => $q->where('id', '!=', $hero->id))
            ->latest()
            ->take(4)
            ->get();

        $trending = Post::with('category')
            ->latest()
            ->take(5)
            ->get();

        $categories = Category::withCount('posts')->orderBy('name')->get();

        $popular = Post::with(['user', 'category'])
            ->latest()
            ->skip($hero ? 5 : 4)
            ->take(3)
            ->get();

        $editorPicks = Post::with(['user', 'category'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('news.index', compact('hero', 'latestNews', 'trending', 'categories', 'popular', 'editorPicks'));
    }

    /**
     * Detail berita
     */
    public function show(Post $post)
    {
        $post->load(['user', 'category']);

        $related = Post::with(['user', 'category'])
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();

        return view('news.show', compact('post', 'related'));
    }

    /**
     * Halaman kategori: filter berita per kategori
     */
    public function category(Category $category)
    {
        $posts = Post::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(9);

        $featured = Post::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->latest()
            ->first();

        $allCategories = Category::withCount('posts')->orderBy('name')->get();

        return view('news.category', compact('category', 'posts', 'featured', 'allCategories'));
    }

    /**
     * Pencarian berita
     */
    public function search(Request $request)
    {
        $q = $request->q;
        $results = collect();

        if ($q) {
            $results = Post::with(['user', 'category'])
                ->where('title', 'like', "%{$q}%")
                ->orWhere('content', 'like', "%{$q}%")
                ->latest()
                ->paginate(10);
        }

        return view('news.search', compact('results', 'q'));
    }
}
