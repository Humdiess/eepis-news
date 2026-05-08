<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * List post
     * + search
     * + filter category
     * + pagination
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $categoryFilter = $request->category;

        $posts = Post::with(['user', 'category'])
            ->when($search, function($query) use ($search){
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($categoryFilter, function($query) use ($categoryFilter){
                $query->where('category_id', $categoryFilter);
            })
            ->latest()
            ->paginate(10);

        $categories = Category::orderBy('name')->get();

        return view('dashboard.posts.index', compact('posts', 'categories'));
    }

    /**
     * Form create post
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Simpan post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'       => 'nullable|string',
        ]);

        $data = [
            'user_id'     => auth()->id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'content'     => $request->input('content'),
            'video'       => $request->video,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        Post::create($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'Berita berhasil dipublikasikan!');
    }

    /**
     * Form edit post
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update post
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'       => 'nullable|string',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'content'     => $request->input('content'),
            'video'       => $request->video,
        ];

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('posts/thumbnails', 'public');
        }

        $post->update($data);

        return redirect()->route('dashboard.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Delete post
     */
    public function destroy(Post $post)
    {
        // Hapus thumbnail jika ada
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index')->with('success', 'Berita berhasil dihapus!');
    }
}