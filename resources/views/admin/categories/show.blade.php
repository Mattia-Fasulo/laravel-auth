@extends('layouts.admin')

@section('content')

    <h1 class="m-3">{{$category->name}}</h1>

    @if ($category->cover_image)
        <div>
            <img width="300" src="{{ asset('storage/' . $category->cover_image) }}">
        </div>
    @endif


@endsection
