<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * List category
     * + search
     * + pagination
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function($query) use ($search){

            $query->where('name', 'like', "%{$search}%");

        })
        ->latest()
        ->paginate(5);

        return view('categories.index', compact('categories'));
    }

    /**
     * Form create category
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Simpan category
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required'
        ]);

        Category::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name)

        ]);

        return redirect()->route('categories.index');
    }
        public function show(Category $category)
            {
    return view('categories.show', compact('category'));
        }

        public function edit(Category $category)
    {
    return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required'
    ]);

    $category->update([

        'name' => $request->name,

        'slug' => Str::slug($request->name)

    ]);

    return redirect()->route('categories.index');
}
    /**
     * Hapus category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}