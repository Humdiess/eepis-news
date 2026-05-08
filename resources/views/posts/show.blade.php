<h1>{{ $post->title }}</h1>

<p>
    {{ $post->content }}
</p>

<p>
    Category:
    {{ $post->category->name }}
</p>

<p>
    Author:
    {{ $post->user->name }}
</p>

@if($post->video)

    <p>
        Video:
        <a href="{{ $post->video }}">
            Lihat Video
        </a>
    </p>

@endif