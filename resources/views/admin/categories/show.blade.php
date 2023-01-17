@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    <div class="mb-5">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Modifica nome categoria</a>
    </div>

    <p>Post con questa categoria:</p>

    @foreach ($category->posts as $post)
        <div>
            <p>
                <a href="{{ route('admin.posts.show', $post->id) }}">
                    {{ $post->title }}
                </a>
            </p>
        </div>
    @endforeach
@endsection
