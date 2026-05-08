<h1>User Management</h1>

<form method="GET">

    <input type="text"
           name="search"
           placeholder="Cari user">

    <button type="submit">
        Cari
    </button>

</form>

<hr>

@foreach($users as $user)

    <p>

        {{ $user->name }}

        -

        {{ $user->email }}

        -

        {{ $user->role }}

    </p>

    <form action="{{ route('users.destroy', $user->id) }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button type="submit">
            Hapus
        </button>

    </form>

    <hr>

@endforeach

{{ $users->links() }}