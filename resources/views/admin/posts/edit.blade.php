@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.posts.update', $post->slug) }}">
        @csrf
        @method('PATCH')
        <div @error('title') class='is-invalid' @enderror>
            <label for="title">Titolo</label>
            <input type="text" name="title" required minlength="5" maxlength="255"
                value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- categories --}}
        <div @error('category_id') class='is-invalid' @enderror>
            <label for="category_id">Categoria</label>
            <select name="category_id">
                <option value="">Nessuna categoria</option>
                <option value="150" {{ 150 == old('category_id', $post->category_id) ? 'selected' : '' }}>FORCE ERROR
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                {{-- @else
                <div class="text-success">Ricevuto</div> --}}
            @enderror
        </div>

        <div @error('content') class='is-invalid' @enderror>
            <label for="content">Contenuto</label>
            <textarea name="content" cols="30" rows="10" required>{{ old('title', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- tags --}}
        @if ($errors->any())
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
        @else
            <div>
                <label>Tags:</label>
                <div class="container">
                    <div class="row">
                        @foreach ($tags as $tag)
                            <div class="col-3">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    {{ $post->tags->contains($tag) ? 'checked' : '' }} />
                                <label>{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- end tags --}}

        <div>
            <input type="submit" value="Aggiorna">
        </div>
    </form>
@endsection
