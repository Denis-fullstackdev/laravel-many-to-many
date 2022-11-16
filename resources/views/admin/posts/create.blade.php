@extends('layouts.dashboard')

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div>
            <label for="title">Titolo</label>
            <input type="text" name="title" required minlength="5" maxlength="255" value="{{ old('title', '') }}">
        </div>
        <div>
            <label for="content">Contenuto</label>
            <textarea name="content" cols="30" rows="10" required>{{ old('title', '') }}</textarea>
        </div>
        <div>
            <input type="submit" value="Invia">
        </div>
    </form>
@endsection
