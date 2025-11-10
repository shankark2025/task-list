<h2>Add Painting</h2>

<form action="{{ route('paintings.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="artist" placeholder="Artist">
    <input type="number" name="year" placeholder="Year">
    <button type="submit">Save</button>
</form>
