<h1>Tambah Category</h1>

<form action="{{ route('categories.store') }}"
      method="POST">

    @csrf

    <input type="text"
           name="name"
           placeholder="Nama category">

    <button type="submit">
        Simpan
    </button>

</form>