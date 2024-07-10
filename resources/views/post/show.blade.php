@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="post mb-4 p-3 border rounded shadow">
                    <h2 class="mt-2 mb-4">Post Page</h2>
                    <div class="mb-1">ID: {{ $post->id }}.</div>
                    <div class="mb-1">Title: {{ $post->title }}</div>
                    <div class="mb-2">Content: {{ $post->content }}</div>

                    <div class="mb-2">Category: {{ $post->category->title ?? '' }}</div>
                    <div class="mb-2">Tags:
                        @foreach($post->tags as $tag)
                            {{ $tag->title }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </div>
                </div>

                <div class="text-center">
                    <form action="{{ route('post.delete', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
                        <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
