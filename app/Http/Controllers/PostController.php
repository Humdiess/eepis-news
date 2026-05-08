<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * List post
     * + search
     * + pagination
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $posts = Post::with(['user', 'category'])

            ->when($search, function($query) use ($search){

                $query->where('title', 'like', "%{$search}%");

            })

            ->latest()
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Form create post
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Simpan post
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'video' => 'nullable'
        ]);

        Post::create([

            'user_id' => auth()->id(),

            'category_id' => $request->category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'content' => $request->content,

            'video' => $request->video

        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Detail post
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Form edit post
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update post
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'content' => $request->content,

            'video' => $request->video

        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Delete post
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}