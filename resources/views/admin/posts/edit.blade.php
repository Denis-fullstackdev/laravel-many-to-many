@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div @error('title') class='is-invalid' @enderror>
            <label for="title">Titolo</label>
            <input type="text" name="title" required minlength="5" maxlength="255"
                value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror>
        </div>
        <div @error('content') class='is-invalid' @enderror>
            <label for="content">Contenuto</label>
            <textarea name="content" cols="30" rows="10" required>{{ old('title', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror>
        </div>
        <div>
            <input type="submit" value="Aggiorna">
        </div>
    </form>
@endsection
