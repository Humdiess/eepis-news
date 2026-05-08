<h1>Detail Category</h1>

<p>
    Nama:
    {{ $category->name }}
</p>

<p>
    Slug:
    {{ $category->slug }}
</p>

<a href="{{ route('categories.index') }}">
    Kembali
</a>