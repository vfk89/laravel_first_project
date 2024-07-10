@extends('layouts.main')
@section('content')
    <div>
        <h2 class="text-center mt-2 mb-4">Post Edit Page</h2>
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ old('title', $post->title) }}">
                @error('title')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{ old('image', $post->image) }}">
                @error('image')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select form-control" id="category" name="category_id">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option {{ old('category_id', $post->category_id) == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags">Tags. Multiple.</label>
                <select class="form-select form-control" name="tags[]" multiple id="tags" aria-label="multiple select example">
                    <option value=""></option>
                    @foreach($tags as $tag)
                        <option {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
