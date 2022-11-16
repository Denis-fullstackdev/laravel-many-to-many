@extends('layouts.dashboard')

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ route('admin.posts.create') }}">Nuovo Post</a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12">
                <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                @if ($post->category)
                    [{{ $post->category->name }}]
                @endif
            </div>
        @endforeach
    </div>
@endsection
