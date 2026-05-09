<h1>Edit Post</h1>

<form action="{{ route('posts.update', $post->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="title"
           value="{{ $post->title }}">

    <br><br>

    <select name="category_id">

        @foreach($categories as $category)

            <option value="{{ $category->id }}"
                {{ $post->category_id == $category->id ? 'selected' : '' }}>

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <br><br>

    <textarea name="content">{{ $post->content }}</textarea>

    <br><br>

    <input type="text"
           name="video"
           value="{{ $post->video }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>