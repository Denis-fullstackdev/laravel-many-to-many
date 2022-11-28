@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <div>
            <p>Post con questa categoria:</p>
            <p>
                <a href="{{ route('admin.posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </p>
        </div>
    @endforeach
@endsection
