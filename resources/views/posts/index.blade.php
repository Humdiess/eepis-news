<h1>Posts</h1>

<form method="GET">

    <input type="text"
           name="search"
           placeholder="Cari post">

    <button type="submit">
        Cari
    </button>

</form>

<br>

<a href="{{ route('posts.create') }}">
    Tambah Post
</a>

<hr>

@foreach($posts as $post)

    <h3>{{ $post->title }}</h3>

    <p>
        Category:
        {{ $post->category->name }}
    </p>

    <p>
        Author:
        {{ $post->user->name }}
    </p>

    <a href="{{ route('posts.show', $post->id) }}">
        Detail
    </a>

    <a href="{{ route('posts.edit', $post->id) }}">
        Edit
    </a>

    <form action="{{ route('posts.destroy', $post->id) }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button type="submit">
            Hapus
        </button>

    </form>

    <hr>

@endforeach

{{ $posts->links() }}