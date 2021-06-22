@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">
            Edit:
            <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
        </h1>
        {{-- ERRORI --}}
        <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>


        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    {{-- TITLE --}}
                    <div class="mb-3">
                        {{-- 
                            settare il metodo old() per mantenere il form compilato in precedenza (es: in caso di chiusura pagina)
                        --}}
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" id="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- TEXT AREA --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Content*</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                            name="content" id="content" rows="5" value="{{ old('content', $post->content) }}"></textarea>
                        @error('content')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- SELECT OPTION CATEGORY --}}
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" @error('categody_id') is-invalid @enderror    
                             name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($category->id == old('category_id', $post->category_id)) selected @endif
                                    >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- SUBMIT --}}
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection