@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>

    <div class="tags">
        Tags:
        @foreach ($post->tags as $tag)
            <div>
                {{ $tag->name }}
            </div>
        @endforeach
    </div>

    @if ($post->category)
        <h3>Categoria del post:</h3>
        <h4>
            <a href="{{ route('admin.categories.show', $post->category->id) }}">
                {{ $post->category->name }}
            </a>
        </h4>
    @else
        <h3>Nessuna categoria</h3>
    @endif


    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
    </div>

    <div class="mt-1">
        <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Cancella" onclick="confirm('Are you sure?')">
        </form>
    </div>
@endsection
