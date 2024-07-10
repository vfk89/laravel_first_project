@extends('layouts.main')
@section('content')
    <div>
        <h2 class="text-center mt-2 mb-4">Post Create Page</h2>
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="{{ old('image') }}">
                @error('image')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category">Category</label>
                <select class="form-select form-control" name="category_id" id="category">
                    <option value=""></option>
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? ' selected' : '' }}

                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="tags">Tags. Multiple.</label>
                <select class="form-select form-control" name="tags[]" multiple id="tags" aria-label="multiple select example">
                    <option value=""></option>
                    @foreach($tags as $tag)
                        <option {{ in_array($tag->id, old('tags', [])) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-danger mx-1">{{ $message }}</p>
                @enderror
            </div>

{{--            <div class="mb-3">--}}
{{--                <label for="likes" class="form-label">Likes</label>--}}
{{--                <input type="number" class="form-control" id="likes" placeholder="Likes">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="title" class="form-label">Title</label>--}}
{{--                <input type="text" class="form-control" id="title" placeholder="Title">--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
