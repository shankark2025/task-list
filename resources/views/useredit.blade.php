@extends('layouts.app')
@section('title', 'Edit User')
@section('styles')
<style>
    .error_message{
        color:red;
        font-size: 0.8rem;
    }
</style>
@endsection
@section('content')
    <x-nav-links />
    <form method="POST" action="{{ route('user.update', ['user'=>$user->id])}}" >
        @csrf
        @method('PUT')
        <div>
            <label for="name">
                Name of the User:
            </label>
            <input text="text" name="name" id="name" value="{{ $user->name }}" />
            @error('name')
                <p class="error_message">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email">User Email</label>
            <input text="text" name="email" id="email" value="{{ $user->email }}" />
            @error('email')
                <p class="error_message">{{$message}}</p>
            @enderror
        </div>




    <div class="mb-4">
        <button type="submit" class="btn mu-10">Edit User</button>
    </div>

    <nav class="mb-4">
    <i><a href={{ route('myuser.show') }} class="link"><- Go back to Users Page</a></i>
</nav>
    </form>
@endsection
