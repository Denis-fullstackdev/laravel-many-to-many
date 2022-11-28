@extends('layouts.dashboard')

@section('content')
    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ route('admin.categories.create') }}">Nuovo Post</a>
        </div>
    </div>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-12">
                <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
            </div>
        @endforeach
    </div>
@endsection
