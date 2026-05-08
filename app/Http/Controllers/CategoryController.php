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

        $categories = Category::withCount('posts')
            ->when($search, function($query) use ($search){
                $query->where('name', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Simpan category
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Update category
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Hapus category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
