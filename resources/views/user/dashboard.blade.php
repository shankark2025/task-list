<h2>Welcome, {{ auth()->user()->name }}!</h2>

<form action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
