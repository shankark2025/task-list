<h2>Edit Painting</h2>

<!-- Show validation errors if any -->
@if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('paintings.update', $painting->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- important: tells Laravel this is an update request -->

    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $painting->title) }}">
    </div>

    <div>
        <label>Artist:</label>
        <input type="text" name="artist" value="{{ old('artist', $painting->artist) }}">
    </div>

    <div>
        <label>Year:</label>
        <input type="number" name="year" value="{{ old('year', $painting->year) }}">
    </div>

    <button type="submit">Update Painting</button>
</form>

<br>
<a href="{{ route('paintings.index') }}">← Back to list</a>
