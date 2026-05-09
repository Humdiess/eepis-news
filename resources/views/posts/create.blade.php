<h1>Tambah Post</h1>

<form action="{{ route('posts.store') }}"
      method="POST">

    @csrf

    <input type="text"
           name="title"
           placeholder="Judul Post">

    <br><br>

    <select name="category_id">

        @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>

        @endforeach

    </select>

    <br><br>

    <textarea name="content"
              placeholder="Isi Post"></textarea>

    <br><br>

    <input type="text"
           name="video"
           placeholder="Link Video">

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>