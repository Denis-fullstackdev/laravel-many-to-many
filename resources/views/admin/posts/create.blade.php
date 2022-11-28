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
        <div @error('category_id') class='is-invalid' @enderror>
            <label for="category_id">Categoria</label>
            <select name="category_id">
                <option value="">Nessuna categoria</option>
                {{--
                    <option value="150" {{ 150 == old('category_id', $post->category_id) ? 'selected' : '' }}>FORCE ERROR
                    </option>
                    mi da errore su $post
                --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', -1) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- end categories --}}

        <div @error('content') class='is-invalid' @enderror>
            <label for="content">Contenuto</label>
            <textarea name="content" cols="30" rows="10" required>{{ old('title', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- tags --}}
        {{-- parentesi quadre in label e input per far capire che lavoriamo con array --}}
        <div @error('tags') class='is-invalid' @enderror>
            <label>Tags:</label>
            <div class="container">
                <div class="row">
                    @foreach ($tags as $tag)
                        <div class="col-3">
                            <label>{{ $tag->name }}</label>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- end tags --}}

        <div>
            <input type="submit" value="Invia">
        </div>

    </form>
@endsection
