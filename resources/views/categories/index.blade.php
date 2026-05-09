<h1>Category</h1>

<form method="GET">

    <input type="text"
           name="search"
           placeholder="Cari category">

    <button type="submit">
        Cari
    </button>

</form>

<br>

<a href="{{ route('categories.create') }}">
    Tambah Category
</a>

<hr>

@foreach($categories as $category)
<a href="{{ route('categories.show', $category->id) }}">
    Detail
</a>

<a href="{{ route('categories.edit', $category->id) }}">
    Edit
</a>
    <p>{{ $category->name }}</p>

    <form action="{{ route('categories.destroy', $category->id) }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button type="submit">
            Hapus
        </button>

    </form>

@endforeach

<hr>

{{ $categories->links() }}