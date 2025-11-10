<h2>Painting Details</h2>

<p><strong>Title:</strong> {{ $painting->title }}</p>
<p><strong>Artist:</strong> {{ $painting->artist }}</p>
<p><strong>Year:</strong> {{ $painting->year }}</p>

<a href="{{ route('paintings.edit', $painting->id) }}">Edit</a> |
<a href="{{ route('paintings.index') }}">Back to list</a>

<form action="{{ route('paintings.destroy', $painting->id) }}" method="POST" style="margin-top: 10px;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Painting</button>
</form>
