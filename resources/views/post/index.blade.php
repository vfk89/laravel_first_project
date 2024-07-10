@extends('layouts.main')

@section('content')
    <div class="text-center">
        <h2 class="mt-2 mb-4">Posts</h2>
        <a class="btn btn-success mb-4" href="{{ route('post.create') }}">Create post</a>
        @foreach($posts as $post)
            <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none text-black">
                <div class="post mb-4 p-3 border rounded w-50 mx-auto shadow"
                    style="transition: background-color 0.3s;">
                    <h4>{{ $post->id }}) {{ $post->title }}</h4>
                    <p class="mb-2"><strong>Tags:</strong>
                        @foreach($post->tags as $tag)
                            {{ $tag->title }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </p>
                    <p><strong>Category:</strong> {{ $post->category->title ?? '' }}</p>
                </div>
            </a>
        @endforeach
        <div class="d-flex justify-content-center gap-3">
            {{ $posts->withqueryString()->links() }}
        </div>
    </div>

@endsection

    <style>
        .post:hover {
            background-color: #f0f0f0; /* Изменение цвета фона при наведении */
        }
    </style>
