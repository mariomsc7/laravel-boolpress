@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Create New Post</h1>
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
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    {{-- TITLE --}}
                    <div class="mb-3">
                        {{-- 
                            settare il metodo old() per mantenere il form compilato in precedenza (es: in caso di chiusura pagina)
                        --}}
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- TEXT AREA --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Content*</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                            name="content" id="content" rows="5" value="{{ old('content') }}"></textarea>
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
                                    @if($category->id == old('category_id')) selected @endif
                                    >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categody_id')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- TAGS --}}
                    <h4>Tags</h4>
                    <div class="mb-3">
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}"
                                    value="{{ $tag->id }}" 
                                    @if (in_array($tag->id, old('tags', []))) checked @endif
                                    >
                                <label for="tag{{ $loop->iteration }}">
                                    {{ $tag->name }}
                                </label>
                            </span>
                        @endforeach 
                        @error('tags')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>



                    {{-- SUBMIT --}}
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection