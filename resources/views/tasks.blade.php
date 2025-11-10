@extends('layouts.app')
@section('title', 'The List of Tasks')
@section('content')

<div>
    <!--
    <nav class="mb-4">
        <i><a href={{ route('tasks.create') }} class="link">Add Task</a> | <a href={{ route('myuser.show') }} class="link">Users</a></i>
    </nav>
    -->
    <x-nav-links />
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['task'=>$task->id] ) }}" @class(['line-through'=>$task->completed]) >{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>
@if($tasks->count())

    <nav class="mt-4">{{$tasks->links()}}</nav>
@endif
@endsection
