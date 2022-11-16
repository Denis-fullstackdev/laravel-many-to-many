@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div @error('title') class='is-invalid' @enderror>
            <label for="title">Titolo</label>
            <input type="text" name="title" required minlength="5" maxlength="255" value="{{ old('title', '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- categories --}}
        <div>
            <label for="category_id">Categoria</label>
            <select name="category_id">
                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div @error('content') class='is-invalid' @enderror>
            <label for="content">Contenuto</label>
            <textarea name="content" cols="30" rows="10" required>{{ old('title', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="Invia">
        </div>
    </form>
@endsection
