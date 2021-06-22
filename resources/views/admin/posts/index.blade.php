@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                deleted successfully!
            </div>
        @endif
        <h1>Posts</h1>
        <a class="btn btn-warning mb-4" href="{{ route('admin.posts.create') }}">Create new post</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><a class="btn btn-success" href="{{ route('admin.posts.show', $post->id) }}">Show</a></td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a></td>
                        <td>
                            <form class="delete-post-form" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="DELETE">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection