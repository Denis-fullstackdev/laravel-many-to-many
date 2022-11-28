@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <div class="row mb-2">
            <div class="col-12 bg-danger">
                Correggere gli errori!
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div @error('name') class='is-invalid' @enderror>
            <label for="name">Nome categoria</label>
            <input type="text" name="name" required maxlength="30" value="{{ old('name', '') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Inserisci nuova categoria">
        </div>

    </form>
@endsection
