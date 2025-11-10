<h2>All Paintings</h2>

<a href="{{ route('paintings.create') }}">Add New Painting</a>

<ul>
@foreach ($paintings as $painting)
    <li>
        {{ $painting->title }} by {{ $painting->artist }} ({{ $painting->year }})
        <a href="{{ route('paintings.edit', $painting->id) }}">Edit</a>
        <form action="{{ route('paintings.destroy', $painting->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
