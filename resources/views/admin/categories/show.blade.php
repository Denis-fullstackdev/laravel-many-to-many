@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    <div class="mb-4 mt-4">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Modifica nome categoria</a>
    </div>

    <div class="mb-5">
        {{-- <a href="{{ route('admin.categories.destroy', $category->id) }}">Cancella categoria</a> //NON SI PUO' FARE IN QUESTO MODO --}}
        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <div>
                <input type="submit" value="Cancella categoria" onclick="confirm('Sei sicuro di voler cancellare?')">
            </div>
        </form>
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
