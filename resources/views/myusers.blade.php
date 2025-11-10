
@extends('layouts.app')
@section('title', 'The List of Users')
@section('content')
<div class="mb-4">
    <x-nav-links />
    <br>
    <div class="mb-4">
    <x-auth.login href="/login" text="User Login" /> | <x-auth.login href="/admin/login" text="Admin Login" /> | <x-auth.login href="/admin/dashboard"  />
    </div>
    <h4>Total Verified Users: {{$secondData;}} </h4>
    @auth
    <p>
    Hello, I am a <strong>normal user</strong>!
    </p>
    @endauth
    @auth('admin')
    <p>
    Hello, I am an <strong>Admin</strong>!
    </p>
    @endauth
    @guest('admin')
        @guest('web')
            Hi, <strong>Guest</strong>!
        @endguest
    @endguest

    @if(Auth::guard('web')->check() && ! Auth::guard('admin')->check())
    {{-- web is logged in and admin is NOT logged in --}}
    <strong>Normal user </strong>content
    @elseif(! Auth::guard('web')->check() && Auth::guard('admin')->check())
    {{-- web is not logged in and admin is logged in --}}
    <strong>Admin </strong>content
    @else(! Auth::guard('web')->check() && ! Auth::guard('admin')->check())
    {{-- both web is not logged in and admin is NOT logged in --}}
    <strong>Guest </strong>content
    @endif



    @forelse ($users as $user)
        <div>
            <strong>{{ $user->name }}</strong>/{{ $user->email }}/<a href="{{ route('user.edit',['user'=>$user->id]) }}" ><strong>edit</strong></a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>

<nav class="mb-4">
    <i><a href={{ route('tasks.index') }} class="link"><- Go to Home Page</a></i>
</nav>

@if($users->count())

    <nav class="mt-4">{{$users->links()}}</nav>
@endif
@endsection
