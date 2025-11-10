@extends('layouts.app')
@section('title', 'Add Task')

<style>
    .error_message{
        color:red;
        font-size: 0.8rem;
    }
</style>

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}" >
        @csrf
        <div class="mb-4">
            <label for="title">
                Title
            </label>
            <input text="text" name="title" id="title" value="{{ old('title') }}"
            @error(['border-red-500'=>$errors->has('title')]) />
            @error('title')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div  class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error">{{$message}}</p>
            @enderror
        </div>

    <div  class="mb-4">
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{$message}}</p>
            @enderror
    </div>
    <div>
        <button type="submit" class="btn">Add Task</button>
    </div>
    </form>
@endsection
