@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>

        @if ($post->category)
            <h2>Category: {{ $post->category->name }}</h2>
        @endif
        <div class="mb-5">
            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit post</a>
        </div>
        <div>
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection